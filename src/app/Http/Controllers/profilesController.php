<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\posts;


class profilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( User $user)
    {
        return  view ('profile.index', [
            'user' => $user,
            'post' => $user->posts
        ]);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {


        return view ('profile/edit', [
            'user' => \App\user::find($user)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,user $user)
    {

        request()->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed',
            ]);

        $user = \App\User::find($user->id);

        if  (request('image') != null){
            $user->image = request('image')->store('images');
        }
        if  (request('cover') != null){
            $user->cover = request('cover')->store('covers');
        }
        $user->name = request('name');
        $user->email = request('email');
        $user->password =  Hash::make(request('password'));
        $user->save();

        return redirect()->route('profile',[$user->username]);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function search(request $request){
        $search = $request->get('search');
        $user = user::where('name' , 'like' , '%' .$search. '%')->get();
        return view ('search', [
            'users' => $user
        ]);
    }
}



