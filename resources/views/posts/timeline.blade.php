@extends('layouts.layouts')

@section('title','timeline page')



@section('content')

<div class="title">
    <h2>TimeLine</h2>
</div>

@foreach ($posts as $post) 

    <div class="TimeLine-main">
        <a href="/users/{{ $post->user->id }}">
          <img src="/storage/post_images/{{ $post->id }}.jpg" class="Post-img" />
        </a>

        
          
        <div class="TimeLine-header">
          <a class="acount" href="/users/{{ $post->user->id }}">
            @if ($post->user->profile_photo)
                <img class="timelinepost-profile-icon round-img" src="{{ asset('storage/user_images/' . $post->user->profile_photo) }}"/>
            @else
                <img class="timelinepost-profile-icon round-img" src="{{ asset('/images/blank_profile.png') }}" />
            @endif
          </a>
          <a class="acount_name" title="{{ $post->user->name }}" href="/users/{{ $post->user->id }}">
            <strong>{{ $post->user->name }}</strong>
          </a>

          <div class="like-body">
            <div class="row parts">
              <div id="likeicon-post-{{ $post->id }}">
                @if ($post->likedBy(Auth::user())->count() > 0)
                  <a class="likes" rel="nofollow" data-method="DELETE" href="/posts/{{ $post->likedBy(Auth::user())->firstOrFail()->id }}/likes_text">GOOD</a>
                @else
                  <a class="likes"  rel="nofollow" data-method="POST" href="/posts/{{ $post->id }}/likes_text">good btn</a>
                @endif
              </div>
              <a class="comment" href="#"></a>
            </div>
            <div id="like-text-post-{{ $post->id }}">
              @include('posts/likes_text')
            </div>
          </div>

        </div>

        
        <p>{{ $post->body }}</p>
        @if($post->user_id == Auth::user()->id)
        <a href="{{ route('post_detail') }}?id={{ $post->id }}" type="btn">detail</a>
        <a href="{{ route('post_edit') }}?id={{ $post->id }}" type="btn">edit</a>
        @endif
        <hr class="cp_hr01"/>
    </div>
@endforeach
@endsection