<?php

namespace App\Http\Controllers;

use App\tourismcities;
use Illuminate\Http\Request;

class TourismcitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('tourismcities.index', [
            'tourismcities' => \App\tourismcities::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('tourismcities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tourismcities = new \App\tourismcities;
        $tourismcities->user_id = auth()->user()->id;
        $tourismcities->title = request('title');
        $tourismcities->body = request('body');
        $tourismcities->save();

        return redirect('/tourismcities');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tourismcities  $tourismcities
     * @return \Illuminate\Http\Response
     */
    public function show(tourismcities $tourismcities)
    {
        return view ('tourismcities.show', [
            'tourismcities' => \App\tourismcities::find($tourismcities->id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tourismcities  $tourismcities
     * @return \Illuminate\Http\Response
     */
    public function edit(tourismcities $tourismcities)
    {
        return view ('tourismcities.edit', [
            'tourismcities' => \App\tourismcities::find($tourismcities->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tourismcities  $tourismcities
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tourismcities $tourismcities)
    {
        $tourismcities = \App\tourismcities::find($tourismcities->id);
        $tourismcities->user_id = auth()->user()->id;
        $tourismcities->title = request('title');
        $tourismcities->body = request('body');
        $tourismcities->save();

        return redirect('/tourismcities');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tourismcities  $tourismcities
     * @return \Illuminate\Http\Response
     */
    public function destroy(tourismcities $tourismcities)
    {
        $tourismcities = \App\tourismcities::find($tourismcities->id);
        $tourismcities->delete();

        return redirect('/tourismcities');
    }
}
