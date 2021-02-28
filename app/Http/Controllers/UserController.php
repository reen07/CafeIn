<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Validator;

use Illuminate\Http\Request;

class UserController extends Controller
{
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = User::all();
        return view('users/index');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, User $id)
    {
        
        $user = User::Find($request->id);
        // $user = $this->user->findOrFail($user_id);

        return view('users/show' , ['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $user = Auth::user();
            
        return view('users/edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'user_name' => 'required|string|max:255',
            'user_password' => 'required|string|min:6|confirmed',
        ]);
        if ($validator->fails())
        {
          return redirect()->back()->withErrors($validator->errors())->withInput();
        }



        $user = User::Find($request->id);
        $user->name = $request -> user_name;

        if($request->user_profile_photo !=null) {
            $request->user_profile_photo->storeAs('public/user_images', $user->id . '.jpg');
            $user->profile_photo = $user->id . '.jpg';
        }
        $user->password = bcrypt($request->user_password);


        $user->save();

        return redirect()->to('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
