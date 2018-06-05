@extends('layout.user_layout')
@section('content')
    <div class="user-content-area">
        <h5>{{$selectedCategory->month_category.' '}}সংখ্যার জন্য ডক/ডক্স(doc/docx) জমা দিন</h5>
        <span>
                    @if(session()->has('success'))
                <span class="text-success">{{session()->get('success')}}</span>
            @endif
            @if(session()->has('error'))
                <span class="text-danger">{{session()->get('error')}}</span>
            @endif
                </span>
        <form action="{{route('createMonthWiseDoc')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="text" name="month_name" value="{{$selectedCategory->month_category}}" hidden >
            <div class="form-group">
                <input type="text" name="title" value="{{old('title')}}" placeholder="শিরনাম লিখুন..." class="form-control">
                <span class="text-danger">{{$errors->first('title')}}</span>
            </div>
            <div class="form-group">
                <select name="doc_type" class="form-control">
                    <option selected disabled hidden>ডক/ডক্স(doc/docx) এর ধরুন পছন্দ করুন</option>
                    <option value="story">গল্প</option>
                    <option value="poem">কবিতা</option>
                    <option value="probondho">প্রবন্ধ</option>
                </select>
                <span class="text-danger">{{$errors->first('doc_type')}}</span>
            </div>
            <div class="form-group">
                <label>ডক/ডক্স(doc/docx) ফাইল পছন্দ করুন</label>
                <input type="file" name="file" class="form-control">
                <span class="text-danger">{{$errors->first('file')}}</span>
            </div>

            <div class="form-group">
                <button class="bg-btn-same">মাসিক ডক/ডক্স জমা দিন</button>
            </div>
        </form>

    </div>

@endsection