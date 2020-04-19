<?php

namespace App\Http\Controllers;

use App\posts;
use Illuminate\Http\Request;
class PostsController extends Controller
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

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        request()->validate([
            'body' => [ 'required' , 'max:255']
        ]);
        
        $posts = new posts;
        $posts->user_id = auth()->id();
        $posts->body =  request('body');

        if  (request('image') != null){
            $posts->image = request('image')->store('posts');
        }

        $posts->save();
        return redirect('/');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function show(posts $posts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function edit(posts $posts)
    {
        $this->authorize('update' , $posts);
        
        return view ('posts.edit', [
            'posts' => \App\posts::find($posts->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, posts $posts)
    {
        $this->authorize('update' , $posts);

        request()->validate([
            'body' => [ 'required' , 'max:255']
            ]);
        $posts = \App\posts::find( $posts->id);
        $posts->user_id = auth()->user()->id;

        if  (request('image') != null){
            $posts->image = request('image')->store('posts');
        }

        $posts->body = request('body');
        $posts->save();
        return redirect()->route('profile',[$posts->user->username]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function destroy( posts $posts)
    {
        $this->authorize('delete' , $posts);

        $posts = \App\posts::find( $posts->id);
        $posts->delete();
        return redirect()->route('profile',[$posts->user->username]);
    }
}
