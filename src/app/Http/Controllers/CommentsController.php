<?php

namespace App\Http\Controllers;

use App\comments;
use App\posts;
use App\User;
use Illuminate\Http\Request;

class CommentsController extends Controller
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
    public function store(Request $request, posts $post)
    {
        request()->validate([
            'body' => [ 'required' , 'max:255']
        ]);
        
        $comment = new \App\comments;
        $comment->user_id = auth()->user()->id ;
        $comment->body = request('body');
        $comment->posts_id = $post->id;
        $comment->save();

        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function show(comments $comments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function edit(comments $comments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, comments $comments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function destroy(comments $comments)
    {
        $comments->delete();
        return back();
    }
}
