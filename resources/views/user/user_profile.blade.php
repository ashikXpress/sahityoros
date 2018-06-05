@extends('layout.user_layout')
@section('content')
    <div class="user-content-area">
        <table class="table table-borderless">
            <thead>
            <tr><th> প্রোফাইল</th></tr>
            <tr>
                <th>
                    <div class="pro-img-content">
                        <img class="user-profile-photo" src="{{asset($user->photo)}}" alt="" >

                    </div>

                    <div class="user-img-change">
                    <form action="{{route('updateUserPhoto',['id'=>Crypt::encrypt($user->id)])}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input  type="file" name="photo">
                        <span class="text-danger">{{$errors->first('photo')}}</span>
                        <button  class="bg-btn-same">ছবি পরিবর্তন</button>
                    </form>
                    </div>

                </th>

            </tr>
            </thead>
            <tbody>
            <tr><td>নাম: {{$user->name}}</td></tr>
            <tr><td>ছদ্দ নাম: {{$user->nick_name}}</td></tr>
            <tr><td>ই-মেইল: {{$user->email}}</td></tr>
            <tr><td>মোবাইল নম্বর: {{$user->mobile_number_1.','.$user->mobile_number_2}}</td></tr>
            <tr><td>পিতার নাম: {{$user->father_name}}</td></tr>
            <tr><td>মাতার নাম: {{$user->mother_name}}</td></tr>
            <tr><td>বাড়ি নম্বর: {{$user->house_no}}</td></tr>
            <tr><td>রোড নম্বর: {{$user->road_no}}</td></tr>
            <tr><td>গ্রাম: {{$user->village}}</td></tr>
            <tr><td>পোস্ট অফিস: {{$user->post_office}}</td></tr>
            <tr><td>পোস্ট কোড: {{$user->post_code}}</td></tr>
            <tr><td>থানা {{$user->thana}}</td></tr>
            <tr><td>জেলা: {{$user->district}}</td></tr>
            <tr><td>ফেইসবুক লিঙ্ক: <a href="{{$user->facebook_url}}" target="_blank">{{$user->facebook_url}}</a></td></tr>
            </tbody>
        </table>
        <a href="{{route('editUser',['id' => Crypt::encrypt($user->id) ])}}" class="bg-btn-same cng-info-btn">তথ্য পরিবর্তন করুন</a>
    </div>
@endsection