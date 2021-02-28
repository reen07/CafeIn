@extends('layouts.layouts')

@section('title','edit mypage')



@section('content')

<div class="edit_profile">
    <div class="profile-form-wrap">
        <form class="edit_user" enctype="multipart/form-data" action="/users/update" accept-charset="UTF-8" method="post">
            <input name="utf8" type="hidden" value="{{ $user->id }}" />
            <input type="hidden" name="id" value="{{ $user->id }}" />

            {{csrf_field()}} 

            <div class="form_group">
                <label for="user_profile_photo">Profile Photo</label><br>
                @if ($user->profile_photo)
                    <p>
                        <img src="{{ asset('storage/user_images/' . $user->profile_photo) }}" alt="avatar" />
                    </p>
                @endif
                <input type="file" name="user_profile_photo"  value="{{ old('user_profile_photo',$user->id) }}" accept="image/jpeg,image/gif,image/png" />
            </div>

            <div class="form-group">
              <label for="user_name">Name</label>
              <input autofocus="autofocus" class="form-control" type="text" value="{{ old('user_name',$user->name) }}" name="user_name" />
            </div>

          <div class="form-group">
            <label for="user_email">E-Mail</label>
            <input autofocus="autofocus" class="form-control" type="email" value="{{ old('user_email',$user->email) }}" name="user_email" />
          </div>

          <div class="form-group">
            <label for="user_password">Password</label>
            <input autofocus="autofocus" class="form-control" type="password" value="{{ old('user_password',$user->password) }}" name="user_password" />
          </div>

          <div class="form-group">
            <label for="user_password_confirmation">Check Password</label>
            <input autofocus="autofocus" class="form-control" type="password" name="user_password_confirmation" />
          </div>

          <input type="submit" name="commit" value="EDIT" class="btn btn-primary" data-disable-with="Change" />
        </div>
      </form>
    </div>
</div>

@endsection