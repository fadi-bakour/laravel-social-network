<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Notifications\Notifiable;
use App\Notifications\newfollower;


class followcontroler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(user $user)
    {

        if (auth()->user()->following($user))
        {
            auth()
            ->user()
            ->unfollow($user);

        }
        else {
            auth()
            ->user()
            ->follow($user);



            $user->notify(new newfollower(auth()->user()->username));
            
        } 
        
        

        return back();
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}


            // $newfollower->follower_id = auth()->user()->name;
            // $newfollower->user_id = $user->name;

            // $newfollower = newfollower::where('user_id' , $user->name );
            // $newfollower1 = newfollower::where('follower_id' ,auth()->user()->name  );
            // return dd($newfollower);
            // $newfollower1->delete();


            // $newfollower =  new newfollower;
            // $newfollower->follower_id = auth()->user()->name;
            // $newfollower->user_id = $user->name;

            // $newfollower->save();