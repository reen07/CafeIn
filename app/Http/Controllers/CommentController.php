<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Validator;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function __construct()
    {
        // ログインしていなかったらログインページに遷移する（この処理を消すとログインしなくてもページを表示する）
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
    
        $comment = new Comment();

        $comment->comment = $request ->comment;
        $comment->post_id = $request ->post_id;
        $comment->user_id = Auth::id();

        $comment->save();

        return redirect() -> to('posts/timeline');

    }

    public function destroy(Request $request){

        $comment = Comment::Find($request->id);

        if(Auth::user()->id == $comment->user_id) {
            $comment -> delete();

            return redirect() -> to('posts/timeline');
        }else{
            return redirect() -> to('posts/timeline');
        }

    }
}
