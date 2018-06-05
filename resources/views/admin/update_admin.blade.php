@extends('layout.admin_layout')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update Admin</h1>
                </div>

            </div>
        </div>
    </section>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Update Admin</h3>

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
                    <form action="{{route('updateAdmin',['id' => Crypt::encrypt($singleAdmin->id) ])}}" method="post">
                        <div class="row">

                            {{csrf_field()}}
                            <div class="col-md-6">
                               <div class="form-group">
                                    <input type="text" name="name" value="{{$singleAdmin->name}}" placeholder="name" class="form-control">
                                    <span class="text-danger">{{$errors->first('name')}}</span>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="email" value="{{$singleAdmin->email}}" placeholder="email" class="form-control">
                                    <span class="text-danger">{{$errors->first('email')}}</span>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="mobile_number" value="{{$singleAdmin->mobile_number}}" placeholder="Mobile number" class="form-control">
                                    <span class="text-danger">{{$errors->first('mobile_number')}}</span>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary">Update admin</button>
                                    <a href="{{route('showDashboard')}}" class="btn btn-primary">back</a>

                                </div>
                            </div>




                        </div>
                    </form>

                </div>



            </div>
        </div>
    </div>


@endsection