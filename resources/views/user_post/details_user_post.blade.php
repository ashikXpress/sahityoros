@extends('layout.user_layout')
@section('content')
    <div class="user-content-area">
        <div class="single-post">
            <h5 class="single-post-header">{{$post->title}}</h5>
            <article class="single-post-body">{{$post->body}}</article>
            <p class="single-post-readmore"> পোষ্ট দাতা: {{$post->user->name}}
                তারিখ: {{$post->created_at}}</p>
        </div>
        @foreach($allComments as $singleComment)
        <div class="comment-view-area">
           @if($singleComment->post_id==$post->id)
              <div class="author-text">
                  <div class="comment-name">{{$singleComment->user->name}}</div>
                  <div class="comment-time">{{$singleComment->created_at}}</div>
              </div>


            <img src="{{asset($singleComment->user->photo)}}" alt="not found" >

            <div class="comment-text">{{$singleComment->comments}}</div>
          <hr>

            @endif

        </div>

        @endforeach
        @if(\Auth::user())
     <div class="comment-area">
            <form action="{{route('createComment')}}" method="post">
                {{csrf_field()}}
                <input type="text" name="post_id" hidden value="{{$post->id}}">
                <div class="form-group">

                    <label for="comments">এখানে কমেন্ট করুন</label>
                    <textarea  name="comments" id="comments"  placeholder="কমেন্ট লিখুন..." class="form-control">{{old('comments')}}</textarea>
                <span class="text-danger">{{$errors->first('comments')}}</span>
                </div>
                <div class="form-group">
                    <button class="login-btn bg-btn-same">কমেন্ট</button>
                </div>
            </form>
        </div>
        @endif
    </div>

@endsection