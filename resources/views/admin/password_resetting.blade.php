@extends('layout.admin_login_layout')
@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href="{{route('showHome')}}"><b>Shaityoros</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Send a new password mail</p>
                <p>   <span>
                    @if(session()->has('success'))
                            <span class="text-success">{{session()->get('success')}}</span>
                        @endif
                        @if(session()->has('error'))
                            <span class="text-danger">{{session()->get('error')}}</span>
                        @endif
                </span></p>

                <form action="{{route('adminPasswordReset')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group has-feedback">
                        <input type="email" name="email" class="form-control" value="{{old('email')}}" placeholder="Type email">
                        <span class="fa fa-envelope form-control-feedback"></span>
                        <span class="text-danger">{{$errors->first('email')}}</span>
                    </div>
                    <div class="row">

                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" style="width: auto" class="btn btn-primary btn-block btn-flat">Reset password</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <div class="social-auth-links text-center mb-3">

                </div>
                <!-- /.social-auth-links -->

            </div>
            <!-- /.login-card-body -->
        </div>


@endsection