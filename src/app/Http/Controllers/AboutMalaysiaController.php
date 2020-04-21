<?php

namespace App\Http\Controllers;

use App\AboutMalaysia;
use Illuminate\Http\Request;

class AboutMalaysiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('aboutmalaysia.index', [
            'aboutmalaysias' => \App\aboutmalaysia::find(1)
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
     * @param  \App\AboutMalaysia  $aboutMalaysia
     * @return \Illuminate\Http\Response
     */
    public function show(AboutMalaysia $aboutMalaysia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AboutMalaysia  $aboutMalaysia
     * @return \Illuminate\Http\Response
     */
    public function edit(AboutMalaysia $aboutMalaysia)
    {
        $this->authorize('update' , $aboutMalaysia);

        return view ('aboutmalaysia.edit', [
            'aboutMalaysia' => aboutmalaysia::find($aboutMalaysia->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AboutMalaysia  $aboutMalaysia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AboutMalaysia $aboutMalaysia)
    {
        $this->authorize('update' , $aboutMalaysia);

        request()->validate([
            'body' => 'required',
        ]);
        
        $aboutMalaysia = aboutMalaysia::find($aboutMalaysia->id);
        if  (request('image') != null){
        $aboutMalaysia->image = request('image')->store('aboutMalaysia');
        }

        $aboutMalaysia->user_id = auth()->user()->id;
        $aboutMalaysia->body = request('body');
        $aboutMalaysia->save();

        return redirect('/aboutmalaysia');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AboutMalaysia  $aboutMalaysia
     * @return \Illuminate\Http\Response
     */
    public function destroy(AboutMalaysia $aboutMalaysia)
    {
        //
    }
}
