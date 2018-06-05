@extends('layout.user_layout')
@section('content')
    <div class="user-content-area">
        <h5>হালনাগাত করুন</h5>
        <span>
                    @if(session()->has('success'))
                <span class="text-success">{{session()->get('success')}}</span>
            @endif
            @if(session()->has('error'))
                <span class="text-danger">{{session()->get('error')}}</span>
            @endif
                </span>
        <form action="{{route('updateUser',['id' => Crypt::encrypt($singleUser->id) ])}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <input type="text" name="name" value="{{$singleUser->name}}" placeholder="name" class="form-control">
                <span class="text-danger">{{$errors->first('name')}}</span>
            </div>
            <div class="form-group">
                <input type="text" name="nick_name" value="{{$singleUser->nick_name}}" placeholder="Nick name" class="form-control">
                <span class="text-danger">{{$errors->first('nick_name')}}</span>
            </div>
            <div class="form-group">
                <input type="text" name="mobile_number_1" value="{{$singleUser->mobile_number_1}}" placeholder="Mobile number 1" class="form-control">
                <span class="text-danger">{{$errors->first('mobile_number_1')}}</span>
            </div>
            <div class="form-group">
                <input type="text" name="mobile_number_2" value="{{$singleUser->mobile_number_2}}" placeholder="Mobile number 2" class="form-control">
                <span class="text-danger">{{$errors->first('mobile_number_2')}}</span>
            </div>
            <div class="form-group">
                <input type="text" name="father_name" value="{{$singleUser->father_name}}" placeholder="Father's name" class="form-control">
                <span class="text-danger">{{$errors->first('father_name')}}</span>
            </div>
            <div class="form-group">
                <input type="text" name="mother_name" value="{{$singleUser->mother_name}}" placeholder="Mother's name" class="form-control">
                <span class="text-danger">{{$errors->first('mother_name')}}</span>
            </div>
            <div class="form-group">
                <input type="text" name="house_no" value="{{$singleUser->house_no}}" placeholder="House no" class="form-control">
                <span class="text-danger">{{$errors->first('house_no')}}</span>
            </div>
            <div class="form-group">
                <input type="text" name="road_no" value="{{$singleUser->road_no}}" placeholder="Road no" class="form-control">
                <span class="text-danger">{{$errors->first('road_no')}}</span>
            </div>
            <div class="form-group">
                <input type="text" name="village" value="{{$singleUser->village}}" placeholder="Village Name" class="form-control">
                <span class="text-danger">{{$errors->first('village')}}</span>
            </div>
            <div class="form-group">
                <input type="text" name="post_office" value="{{$singleUser->post_office}}" placeholder="Post office" class="form-control">
                <span class="text-danger">{{$errors->first('post_office')}}</span>
            </div>
            <div class="form-group">
                <input type="text" name="post_code" value="{{$singleUser->post_code}}" placeholder="Post code" class="form-control">
                <span class="text-danger">{{$errors->first('post_code')}}</span>
            </div>
            <div class="form-group">
                <input type="text" name="thana" value="{{$singleUser->thana}}" placeholder="Thana" class="form-control">
                <span class="text-danger">{{$errors->first('thana')}}</span>
            </div>
            <div class="form-group">
                <input type="text" name="district" value="{{$singleUser->district}}" placeholder="District" class="form-control">
                <span class="text-danger">{{$errors->first('district')}}</span>
            </div>
            <div class="form-group">
                <input type="text" name="facebook_url" value="{{$singleUser->facebook_url}}" placeholder="Facebook url" class="form-control">
                <span class="text-danger">{{$errors->first('facebook_url')}}</span>
            </div>
            <div class="form-group">
                <input type="text" name="email" value="{{$singleUser->email}}" placeholder="email" class="form-control">
                <span class="text-danger">{{$errors->first('email')}}</span>
            </div>

            <div class="form-group">
                <input type="password" name="password" value="{{old('password')}}" placeholder="password" class="form-control">
                <span class="text-danger">{{$errors->first('password')}}</span>
            </div>
            <div class="form-group">
                <input type="password" name="retype_password" value="{{old('retype_password')}}" placeholder="retype_password" class="form-control">
                <span class="text-danger">{{$errors->first('retype_password')}}</span>
            </div>

            <div class="form-group">
                <button class="bg-btn-same">হালনাগাত করুন</button>
            </div>
        </form>

    </div>

@endsection