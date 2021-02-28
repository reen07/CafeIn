<?php

namespace App\Http\Controllers;

use App\Post;
use App\Like;
// use Auth;
use Illuminate\Support\Facades\Auth;
use Validator;

use Illuminate\Http\Request;


class PostController extends Controller
{

    //コンストラクタ （このクラスが呼ばれると最初にこの処理をする）
    public function __construct()
    {
        // ログインしていなかったらログインページに遷移する（この処理を消すとログインしなくてもページを表示する）
        $this->middleware('auth');
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::limit(10)
            ->orderBy('created_at', 'desc')
            ->get();
            
         // テンプレート「post/index.blade.php」を表示します。
        return view('posts/timeline', ['posts' => $posts]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts/newcreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all() , ['body' => 'required|max:255', 'photo' => 'required']);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        
        $post = new Post();

        $post->body = $request ->body;
        $post->user_id = Auth::id();

        $post->save();
        
        $request->photo->storeAs('public/post_images', $post->id . '.jpg');
        
        // 「/」 ルートにリダイレクト
        return redirect() -> to('posts/timeline');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
        $post = Post::Find($request->id);
        if(Auth::user()->id == $post->user_id){

        return view('posts/editpost', ['post' =>$post]);
        }else{
            return view('posts/timeline');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
        $post = Post::Find($request->id);

        $post->body = $request ->body;
        $post->user_id = Auth::id();

        $post -> save();

        return redirect() -> to('posts/timeline');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $post = Post::Find($request->id);
       if(Auth::user()->id == $post->user_id){
       
       $post -> delete();
       

       return redirect() -> to('posts/timeline');
    }else{
        return view('posts/timeline');
    }
    }
}
