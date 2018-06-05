@extends('layout.admin_layout')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Footer  and Preview</h1>
                </div>

            </div>
        </div>
    </section>




    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Create footer</h3>

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
                    <form action="{{route('createFooter')}}" method="post">

                    <div class="row">
                            {{csrf_field()}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea name="address_info"  placeholder="Type footer address" class="form-control">{{old('address_info')}}</textarea>
                                    <span class="text-danger">{{$errors->first('address_info')}}</span>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea name="contact_info"  placeholder="Type footer contact" class="form-control">{{old('contact_info')}}</textarea>
                                    <span class="text-danger">{{$errors->first('contact_info')}}</span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <button class="btn btn-primary">Create footer</button>
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
                    <h3 class="card-title">Footer Text Preview List</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped table-custom-responsive">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Address Info</th>
                            <th>Contact Info</th>
                            <th>Status</th>
                            <th style="text-align: center;">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                        @foreach($footers as $footer)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$footer->address_info}}</td>
                                <td>{{$footer->contact_info}}</td>

                                @if($footer->status=='pending')
                                    <td class="text-warning">Unpublished </td>
                                @else
                                    <td class="text-success">Published </td>
                                @endif

                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-gear tiny-icon"></i><span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-right" role="menu">

                                            @if($footer->status=='pending')
                                                <li><a href="{{route('footerPublished',['id'=>Crypt::encrypt($footer->id)])}}"><i class="fa fa-play-circle"></i>Published</a></li>
                                                <li><a href="{{route('footerEdit',['id'=>Crypt::encrypt($footer->id)])}}"><i class="fa fa-pencil tiny-icon"></i>Edit</a></li>
                                                <li><a href="#" onclick="return checkDelete('{{route('footerDelete',['id'=>Crypt::encrypt($footer->id)])}};')"><i class="fa fa-trash tiny-icon"></i>Delete</a></li>

                                                @else
                                                <li><a href="{{route('footerEdit',['id'=>Crypt::encrypt($footer->id)])}}"><i class="fa fa-pencil tiny-icon"></i>Edit</a></li>
                                                <li><a href="#" onclick="return checkDelete('{{route('footerDelete',['id'=>Crypt::encrypt($footer->id)])}};')"><i class="fa fa-trash tiny-icon"></i>Delete</a></li>

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
                            <th>Address Info</th>
                            <th>Contact Info</th>
                            <th>Status</th>
                            <th style="text-align: center;">Action</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix justify-content-end">
                    {{$footers->links()}}
                </div>
            </div>
        </div>
    </div>

@endsection