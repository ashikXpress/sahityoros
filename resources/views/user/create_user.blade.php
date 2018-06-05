@extends('layout.user_layout')
@section('content')
    <div class="user-content-area">
        <h5>নিবন্ধন করুন</h5>
        <span>
                    @if(session()->has('success'))
                <span class="text-success">{{session()->get('success')}}</span>
            @endif
            @if(session()->has('error'))
                <span class="text-danger">{{session()->get('error')}}</span>
            @endif
                </span>
        <form action="{{route('createUser')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <input type="text" name="name" value="{{old('name')}}" placeholder="নাম লিখুন..." class="form-control">
                <span class="text-danger">{{$errors->first('name')}}</span>
            </div>
            <div class="form-group">
                <input type="text" name="nick_name" value="{{old('nick_name')}}" placeholder="ছদ্দ নাম লিখুন..." class="form-control">
                <span class="text-danger">{{$errors->first('nick_name')}}</span>
            </div>
            <div class="form-group">
                <input type="text" name="mobile_number_1" value="{{old('mobile_number_1')}}" placeholder="মোবাইল নম্বর লিখুন ১..." class="form-control">
                <span class="text-danger">{{$errors->first('mobile_number_1')}}</span>
            </div>
            <div class="form-group">
                <input type="text" name="mobile_number_2" value="{{old('mobile_number_2')}}" placeholder="মোবাইল নম্বর লিখুন ২..." class="form-control">
                <span class="text-danger">{{$errors->first('mobile_number_2')}}</span>
            </div>
            <div class="form-group">
                <input type="text" name="father_name" value="{{old('father_name')}}" placeholder="পিতার নাম লিখুন..." class="form-control">
                <span class="text-danger">{{$errors->first('father_name')}}</span>
            </div>
            <div class="form-group">
                <input type="text" name="mother_name" value="{{old('mother_name')}}" placeholder="মাতার নাম লিখুন..." class="form-control">
                <span class="text-danger">{{$errors->first('mother_name')}}</span>
            </div>
            <div class="form-group">
                <input type="text" name="house_no" value="{{old('house_no')}}" placeholder="বাড়ি নম্বর লিখুন..." class="form-control">
                <span class="text-danger">{{$errors->first('house_no')}}</span>
            </div>
            <div class="form-group">
                <input type="text" name="road_no" value="{{old('road_no')}}" placeholder="রোড নম্বর লিখুন..." class="form-control">
                <span class="text-danger">{{$errors->first('road_no')}}</span>
            </div>
            <div class="form-group">
                <input type="text" name="village" value="{{old('village')}}" placeholder="গ্রামের নাম লিখুন..." class="form-control">
                <span class="text-danger">{{$errors->first('village')}}</span>
            </div>
            <div class="form-group">
                <input type="text" name="post_office" value="{{old('post_office')}}" placeholder="পোস্ট অফিসের নাম লিখুন..." class="form-control">
                <span class="text-danger">{{$errors->first('post_office')}}</span>
            </div>
            <div class="form-group">
                <input type="text" name="post_code" value="{{old('post_code')}}" placeholder="পোস্ট কোড লিখুন..." class="form-control">
                <span class="text-danger">{{$errors->first('post_code')}}</span>
            </div>
            <div class="form-group">
                <input type="text" name="thana" value="{{old('thana')}}" placeholder="থানার নাম লিখুন..." class="form-control">
                <span class="text-danger">{{$errors->first('thana')}}</span>
            </div>
            <div class="form-group">
                <input type="text" name="district" value="{{old('district')}}" placeholder="জেলার নাম লিখুন..." class="form-control">
                <span class="text-danger">{{$errors->first('district')}}</span>
            </div>
            <div class="form-group">
                <input type="text" name="facebook_url" value="{{old('facebook_url')}}" placeholder="ফেইসবুক লিঙ্ক লিখুন..." class="form-control">
                <span class="text-danger">{{$errors->first('facebook_url')}}</span>
            </div>
           <div class="form-group">
                <input type="text" name="email" value="{{old('email')}}" placeholder="ইমেই লিখুন..." class="form-control">
                <span class="text-danger">{{$errors->first('email')}}</span>
            </div>

            <div class="form-group">
                <input type="password" name="password" value="{{old('password')}}" placeholder="পাসওয়াড লিখুন..." class="form-control">
                <span class="text-danger">{{$errors->first('password')}}</span>
            </div>
            <div class="form-group">
                <input type="password" name="retype_password" value="{{old('retype_password')}}" placeholder="পুনরায় পাসওয়াড লিখুন..." class="form-control">
                <span class="text-danger">{{$errors->first('retype_password')}}</span>
            </div>
            <div class="form-group">
                <label id="photo">ছবি নির্দিষ্ট করুন</label>
                <input type="file" id="photo" name="photo" value="{{old('photo')}}" placeholder="photo" class="form-control">
                <span class="text-danger">{{$errors->first('photo')}}</span>
            </div>
            <div class="form-group">
                <button class="bg-btn-same">নিবন্ধন করুন</button>
            </div>
        </form>

    </div>

@endsection