@extends('layout.admin_layout')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update Left Adds</h1>
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
                    <form action="{{route('leftAddsUpdate',['id'=>Crypt::encrypt($singleLeftAdds->id)])}}" method="post" enctype="multipart/form-data">

                    <div class="row">
                            {{csrf_field()}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="adds_links" value="{{$singleLeftAdds->adds_links}}" placeholder="Adds url" class="form-control">
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
                                <button class="btn btn-primary">Update left adds</button>
                                <a href="{{route('showDashboard')}}" class="btn btn-primary">Back</a>

                            </div>
                        </div>
                    </form>

                </div>



            </div>
        </div>
    </div>

@endsection