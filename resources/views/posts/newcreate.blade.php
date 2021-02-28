@extends('layouts.layouts')

@section('title','post page')



@section('content')

    <div class="post_body">
        @include('common.errors')

        <div class="post_card">
            <form class="post-images p-0 border-0" id="new_post" enctype="multipart/form-data" action="{{ url('posts/timeline')}}" accept-charset="UTF-8" method="POST">
                {{csrf_field()}} 
                <div class="form-group">
                    <div class="view-img">
                      <img class="post-profile-icon round-img" src="{{ asset('storage/user_images/' . Auth::user()->id . '.jpg') }}"/>
                    </div>
                    <div class="post-comment">
                      <input class="form-control border-0" placeholder="Post Comment" type="text" name="body" value="{{ old('list_name') }}"/>
                    </div>
                  </div>
                  <div class="selict-photo">
                    <input type="file" name="photo" accept="image/jpeg,image/gif,image/png" />
                  </div>
                  <input type="submit" name="commit" value="Post" class="btn btn-primary" data-disable-with="Post" />
            </form>      
        </div>
    
    </div>



    <script type="text/javascript">
        $('#post_image').bind('change', function() {
          var size_in_megabytes = this.files[0].size/1024/1024;
          if (size_in_megabytes > 1) {
            alert('ファイルサイズの最大は1MBまでです。違う画像を選んでください。');
          }
        });
      </script>




@endsection