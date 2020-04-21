<?php

namespace App\Http\Controllers;

use App\comments;
use App\posts;
use Illuminate\Http\Request;
use App\user;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(user $user)
    {
        return view('main', [
            'post' => auth()->user()->timeline(),
            'user' => $user,
        ]);
    }
}




