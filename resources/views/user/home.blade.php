@extends('layout.user_layout')
@section('content')


            @foreach($posts as $post)
            <div class="single-post">
                <h5 class="single-post-header">{{$post->title}}</h5>
                <article class="single-post-body">{{\Illuminate\Support\Str::words($post->body, $words = 70, $end = '...')}} <a href="{{route('detailsPost',['id' => Crypt::encrypt($post->id) ])}}">আরো  পড়ুন</a> </article>
                <p class="single-post-readmore"> পোষ্ট দাতা: {{$post->user->name}}
                    তারিখ: {{$post->created_at}}</p>
            </div>
            @endforeach
            <div class="row justify-content-center">
                <div class="pagination-area">
                    {{$posts->links()}}
                </div>
            </div>



@endsection