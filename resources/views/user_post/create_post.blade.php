@extends('layout.user_layout')
@section('content')
    <div class="user-content-area">
        <h5>পোষ্ট করুন</h5>
        <span>
                    @if(session()->has('success'))
                <span class="text-success">{{session()->get('success')}}</span>
            @endif
            @if(session()->has('error'))
                <span class="text-danger">{{session()->get('error')}}</span>
            @endif
                </span>
        <form action="{{route('createPost')}}" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <input type="text" name="title" value="{{old('title')}}" placeholder="শিরোনাম লিখুন..." class="form-control">
                <span class="text-danger">{{$errors->first('title')}}</span>
            </div>
            <div class="form-group">
                <textarea name="body" rows="8" cols="60" class="form-control" placeholder="পোষ্ট লিখুন..."></textarea>
                <span class="text-danger">{{$errors->first('body')}}</span>
            </div>

            <div class="form-group">
                <button class="bg-btn-same">পোষ্ট করুন</button>
            </div>
        </form>

    </div>

@endsection