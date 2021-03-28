@extends('layouts.layouts')

@section('title','make comment page')



@section('content')

<div class="comment">

          
    <div id="commenticon-post-{{ $post->id }}">
      @include('posts/post_comment')
    </div>
    {{-- <a class="light-color post-time no-text-decoration" href="/posts/{{ $post->id }}">{{ $post->created_at }}</a> --}}

    <div class="comment-post" id="comment-form-post-{{ $post->id }}">
      <form id="new-commnet" action="{{ route('post_comment')}}" method="post">
        <input name="utf8" type="hidden" value="write comment" />
             {{csrf_field()}} 
           <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
           <input type="hidden" name="post_id" value="{{ $post->id }}">
           <input type="text" name="comment" class="make-comment" value="write comment" >
           <input type="submit"  value="Post" class="comment-btn"/>
      </form>
    </div>
  </div>

@endsection