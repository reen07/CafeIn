@extends('layouts.layouts')

@section('title','edit page')

@section('content')
    <div class="edit">
        
        
        <form action="{{ route('post_update') }}?id={{ $post->id }}" method="POST">
            @csrf
            @method('PATCH')


            <input name="post_id" type="hidden" value="{{$post->id}}">
            <textarea class="editMessage" name="body" id="">{{ $post->body }}</textarea>

            <input class="btn" type="submit" value="UPDATE!!">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
        
        </form>
    </div>


@endsection
