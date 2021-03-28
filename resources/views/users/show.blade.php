@extends('layouts.layouts')

@section('title','my page')



@section('content')


<div class="profile-wrap">
    <div class="profiel_photo">
        @if ($user['plofile_photo'])
          <p>
            <img class="round-img" src="{{ asset('storage/user_images/' . $user->profile_photo) }}"/>
          </p>
          @else
            <img class="round-img" src="{{ asset('/images/blank_profile.png') }}"/>
        @endif
    </div>

      <div class="profiel_name">
        <div class="pro_btn">
          <h1>{{ Auth::user()->name }}</h1>
  
            @if (Auth::user()->id)
            <a class="btn btn-outline-dark common-btn edit-profile-btn" href="/users/edit">edit profiel</a>
            <a class="btn btn-outline-dark common-btn edit-profile-btn" rel="nofollow" data-method="POST" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
            @endif
        </div>
        <div class="mail">
          <p>
            {{ Auth::user()->email }}
          </p>
        </div>
      </div>
</div>
    
@endsection