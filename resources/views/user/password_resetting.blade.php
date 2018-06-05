@extends('layout.user_layout')
@section('content')
    <div class="user-content-area">
        <h5>পাসওয়াড রিসেট করুন</h5>
        <span>
                    @if(session()->has('success'))
                <span class="text-success">{{session()->get('success')}}</span>
            @endif
            @if(session()->has('error'))
                <span class="text-danger">{{session()->get('error')}}</span>
            @endif
                </span>
        <form action="{{route('userPasswordResetting')}}" method="post">
            {{csrf_field()}}

            <div class="form-group">
                <input type="text" name="email" value="{{old('email')}}" placeholder="ইমেইল লিখুন..." class="form-control">
                <span class="text-danger">{{$errors->first('email')}}</span>
            </div>

            <div class="form-group">
                <button class="bg-btn-same">পাসওয়াড রিসেট</button>
            </div>
        </form>

    </div>

@endsection