@extends('layout.admin_layout')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Left Adds and Preview List</h1>
                </div>

            </div>
        </div>
    </section>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Create left adds </h3>

                    <span>
                    @if(session()->has('success'))
                            <span class="text-success">{{session()->get('success')}}</span>
                        @endif
                        @if(session()->has('error'))
                            <span class="text-danger">{{session()->get('error')}}</span>
                        @endif
                </span>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{route('createLeftAdds')}}" method="post" enctype="multipart/form-data">

                    <div class="row">
                          {{csrf_field()}}
                        <div class="col-md-6">
                            <div class="form-group">

                                <input type="text" name="adds_links" value="{{old('adds_links')}}" placeholder="Adds url" class="form-control">
                                <span class="text-danger">{{$errors->first('adds_links')}}</span>
                            </div>
                          </div>
                        <div class="col-md-6">
                            <div class="form-group">

                                <input type="file" name="adds_image"  class="form-control">
                                <span class="text-danger">{{$errors->first('adds_image')}}</span>
                            </div>
                        </div>

                            <div class="col-md-4">
                                <button class="btn btn-primary">Create left adds</button>
                                <a href="{{route('showDashboard')}}" class="btn btn-primary">back</a>

                            </div>
                        </div>
                    </form>

                </div>



            </div>
        </div>
    </div>




 <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Left Adds Preview</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped table-custom-responsive">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Adds Links</th>
                            <th>image Preview</th>
                            <th>Status</th>
                            <th style="text-align: center;">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($leftAdds as $leftadd)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$leftadd->adds_links}}</td>
                                <td>
                                    <img style="width: 80px;" src="{{asset($leftadd->adds_image)}}" alt="">
                                </td>
                                @if($leftadd->status=='published')
                                    <td class="text-success">Published</td>
                                @else
                                    <td class="text-warning">unpublished</td>
                                @endif

                                <td style="text-align: center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-gear tiny-icon"></i><span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-right" role="menu">

                                            @if($leftadd->status=='published')
                                                <li><a href="{{route('leftAddsUnpublished',['id'=>Crypt::encrypt($leftadd->id)])}}"><i class="fa fa-pause-circle"></i>Unpublished</a></li>
                                                <li><a href="{{route('leftAddsEdit',['id'=>Crypt::encrypt($leftadd->id)])}}"><i class="fa fa-pencil tiny-icon"></i>Edit</a></li>
                                                <li><a href="#" onclick="return checkDelete('{{route('leftAddsDelete',['id'=>Crypt::encrypt($leftadd->id)])}};')"><i class="fa fa-trash tiny-icon"></i>Delete</a></li>

                                            @else
                                                <li><a href="{{route('leftAddsPublished',['id'=>Crypt::encrypt($leftadd->id)])}}"><i class="fa fa-play-circle"></i>Published</a></li>
                                                <li><a href="{{route('leftAddsEdit',['id'=>Crypt::encrypt($leftadd->id)])}}"><i class="fa fa-pencil tiny-icon"></i>Edit</a></li>
                                                <li><a href="#" onclick="return checkDelete('{{route('leftAddsDelete',['id'=>Crypt::encrypt($leftadd->id)])}};')"><i class="fa fa-trash tiny-icon"></i>Delete</a></li>

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
                            <th>Adds Links</th>
                            <th>image Preview</th>
                            <th>Status</th>
                            <th style="text-align: center;">Action</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix justify-content-end">
                    {{$leftAdds->links()}}
                </div>
            </div>
        </div>
    </div>



@endsection