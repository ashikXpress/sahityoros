@extends('layout.admin_layout')
@section('content')

<section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Users Manuscript</h1>
                </div>

            </div>
        </div>
    </section>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Users Manuscript List</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped table-custom-responsive">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Title</th>
                            <th>Posted by</th>
                            <th>Email</th>
                            <th>Date</th>
                            <th>Download Doc/Docx file</th>
                            <th style="text-align: center;">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                        @foreach($manuscripts as $manuscript)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{\Illuminate\Support\Str::words($manuscript->title, $words = 10, $end = '..')}}</td>
                                <td>{{$manuscript->user->name}}</td>
                                <td>{{$manuscript->user->email}}</td>
                                <td>{{$manuscript->created_at}}</td>
                                <td><a href="{{asset($manuscript->file)}}">Download</a></td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-gear tiny-icon"></i><span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                            <li><a href="#" onclick="return checkDelete('{{route('manuscriptDelete',['id'=>Crypt::encrypt($manuscript->id)])}};')"><i class="fa fa-trash tiny-icon"></i>Delete</a></li>
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
                            <th>Email</th>
                            <th>Date</th>
                            <th>Download Doc/Docx file</th>
                            <th style="text-align: center;">Action</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix justify-content-end">
                    {{$manuscripts->links()}}
                </div>
            </div>
        </div>
    </div>

@endsection