@extends('layout.admin_layout')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>User Posts</h1>
                </div>

            </div>
        </div>
    </section>

 <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">User Post List</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-custom-responsive">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Title</th>
                        <th>Posted by</th>
                        <th>Date</th>
                        <th>Post description</th>
                        <th>Status</th>
                        <th style="text-align: center;">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->user->name}}</td>
                            <td>{{$post->created_at}}</td>
                            <td>
                                {{\Illuminate\Support\Str::words($post->body, $words = 15, $end = '...')}}

                            </td>
                            @if($post->status=='pending')
                                <td class="text-warning">Pending</td>
                            @else
                                <td class="text-success">Published</td>
                            @endif
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-gear tiny-icon"></i><span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                        @if($post->status=='approve')

                                            <li><a href="{{route('postPending',['id'=>Crypt::encrypt($post->id)])}}" ><i class="fa fa-pause-circle"></i>Pending</a></li>
                                            <li><a href="#" onclick="return checkDelete('{{url('postDelete',['id'=>Crypt::encrypt($post->id)])}};')" ><i class="fa fa-trash tiny-icon"></i>Delete</a></li>

                                        @elseif($post->status=='pending')
                                            <li><a href="{{route('postApprove',['id'=>Crypt::encrypt($post->id)])}}" ><i class="fa fa-play-circle"></i>Approve</a></li>
                                            <li><a href="#" onclick="return checkDelete('{{route('postDelete',['id'=>Crypt::encrypt($post->id)])}};')"><i class="fa fa-trash tiny-icon"></i>Delete</a></li>

                                        @endif
                                    </ul>
                                </div>
                            </td>

                        </tr>
                    @endforeach

                    </tbody>
                    <tfoot>
                    <tr>
                        <th>SL</th>
                        <th>Title</th>
                        <th>Posted by</th>
                        <th>Date</th>
                        <th>Post description</th>
                        <th>Status</th>
                        <th style="text-align: center;">Action</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix justify-content-end">
                {{$posts->links()}}
            </div>
        </div>
    </div>
</div>

@endsection