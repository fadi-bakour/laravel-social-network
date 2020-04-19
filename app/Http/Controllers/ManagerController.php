<?php

namespace App\Http\Controllers;

use App\Manager;
use Illuminate\Http\Request;
use \App\user;
use \App\role_user;
use Error;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(user $user)
    {
        $user = \App\user::get();
        return view ('manager.index',[
            'user' => $user,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view ('manager.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , role_user $role_user, user $user)
    {
        request()->validate([
            'role' => 'required',
            'username' => 'required',            
            ]);
        
        $role_user->role_id = request('role');
        $user1 = request('username');

        $user = \App\User::where('username', $user1)->first();
        $role_user->user_id = $user->id;
        $role_user->save();
        return redirect('/manager');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function show(Manager $manager )
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function edit(Manager $manager , user $user , role_user $role_user)
    {
        $this->authorize('update' , $manager);

        $user = \App\user::find($user->id);
        return view ('manager.edit',[
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Manager $manager)
    {
        $this->authorize('update' , $manager);
        
        request()->validate([
            'role' => 'required',
            'username' => 'required',            
            ]);
        
        $user1 = request('username');
        $user = \App\User::where('username', $user1)->first();
        $user->roles()->detach();
        $user->roles()->attach(request('role'));
        $user->save();
        return redirect('/manager');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manager $manager, user $user)
    {
        $this->authorize('delete' , $manager);

        $user->roles()->detach();
        $user->save();
        return redirect('/manager');
    }
}

// $username = request('username');
// $user = \App\User::where('username', $username)->first();
// $role_user->role_id = request('role'); 
// $role_user->user_id = $user->id;
// // dd($role_user);
// $role_user->save();
// return redirect('/manager');