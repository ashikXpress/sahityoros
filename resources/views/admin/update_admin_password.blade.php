@extends('layout.admin_layout')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update Admin Password</h1>

                </div>

            </div>
        </div>
    </section>


    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Update password</h3>

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
                    <form action="{{route('updateAdminPassword',['id'=>Crypt::encrypt($adminPassword->id)])}}" method="post">
                        <div class="row">

                            {{csrf_field()}}

                            <div class="col-md-6">

                                <div class="form-group">
                                    <input type="password" name="old_password" value="{{old('old_password')}}" placeholder="Old Password" class="form-control">
                                    <span class="text-danger">{{$errors->first('old_password')}}</span>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" value="{{old('password')}}" placeholder="New Password" class="form-control">
                                    <span class="text-danger">{{$errors->first('password')}}</span>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="retype_password" value="{{old('retype_password')}}" placeholder="Retype New Password" class="form-control">
                                    <span class="text-danger">{{$errors->first('retype_password')}}</span>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary">Create admin</button>
                                    <a href="{{route('showDashboard')}}" class="btn btn-primary">Back</a>

                                </div>
                            </div>


                        </div>
                    </form>

                </div>



            </div>
        </div>
    </div>
@endsection