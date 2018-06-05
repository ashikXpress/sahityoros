@extends('layout.admin_login_layout')
@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href="{{route('showHome')}}"><b>Shaityoros</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Login to start your session</p>
                <p>   <span>
                    @if(session()->has('success'))
                            <span class="text-success">{{session()->get('success')}}</span>
                        @endif
                        @if(session()->has('error'))
                            <span class="text-danger">{{session()->get('error')}}</span>
                        @endif
                </span></p>

                <form action="{{route('adminLogin')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group has-feedback">
                        <input type="email" name="email" class="form-control" value="{{old('email')}}" placeholder="Type email">
                        <span class="fa fa-envelope form-control-feedback"></span>
                        <span class="text-danger">{{$errors->first('email')}}</span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" name="password" class="form-control" value="{{old('password')}}" placeholder="Type password">
                        <span class="fa fa-lock form-control-feedback"></span>
                        <span class="text-danger">{{$errors->first('password')}}</span>
                    </div>
                    <div class="row">

                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <div class="social-auth-links text-center mb-3">

                </div>
                <!-- /.social-auth-links -->

                <p class="mb-1">
                    <a href="{{route('showForgottentForm')}}">I forgot my password?</a>
                </p>

            </div>
            <!-- /.login-card-body -->
        </div>


@endsection