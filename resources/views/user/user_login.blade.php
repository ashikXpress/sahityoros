@extends('layout.user_layout')
@section('content')
    <div class="user-content-area">
        <h5>লগইন করুন</h5>
        <span>
                    @if(session()->has('success'))
                <span class="text-success">{{session()->get('success')}}</span>
            @endif
            @if(session()->has('error'))
                <span class="text-danger">{{session()->get('error')}}</span>
            @endif
                </span>
        <form action="{{route('userLogin')}}" method="post">
            {{csrf_field()}}

            <div class="form-group">
                <input type="text" name="email" value="{{old('email')}}" placeholder="ইমেইল লিখুন..." class="form-control">
                <span class="text-danger">{{$errors->first('email')}}</span>
            </div>
            <div class="form-group">
                <input type="password" name="password" value="{{old('password')}}" placeholder="পাসওয়াড লিখুন..." class="form-control">
                <span class="text-danger">{{$errors->first('password')}}</span>
            </div>

            <div class="form-group">
                <button class="bg-btn-same">লগইন করুন</button>
                <a class="login-btn bg-btn-same" href="{{route('userPasswordResettingForm')}}">পাসওয়াড ভুলে গেছেন?</a>
            </div>
        </form>

    </div>

@endsection