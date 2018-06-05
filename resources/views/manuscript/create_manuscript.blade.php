@extends('layout.user_layout')
@section('content')
    <div class="user-content-area">
        <h5>বই প্রকাশের জন্য পাণ্ডুলিপি জমা দিন </h5>
        <span>
                    @if(session()->has('success'))
                <span class="text-success">{{session()->get('success')}}</span>
            @endif
            @if(session()->has('error'))
                <span class="text-danger">{{session()->get('error')}}</span>
            @endif
                </span>
        <form action="{{route('createManuscript')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <input type="text" name="title" value="{{old('title')}}" placeholder="শিরোনাম লিখুন..." class="form-control">
                <span class="text-danger">{{$errors->first('title')}}</span>
            </div>
            <div class="form-group">
                <label>ডক/ডক্স(doc/docx) ফাইল পছন্দ করুন</label>
                <input type="file" name="file" class="form-control">
                <span class="text-danger">{{$errors->first('file')}}</span>
            </div>

            <div class="form-group">
                <button class="bg-btn-same">পাণ্ডুলিপি জমা দিন</button>
            </div>
        </form>

    </div>

@endsection