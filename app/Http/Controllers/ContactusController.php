<?php

namespace App\Http\Controllers;

use App\contactus;
use Illuminate\Http\Request;

class ContactusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(contactus $contactus)
    {
        return view ('contactus.index',[
            'contactus' => \App\contactus::find(1)
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
     * @param  \App\contactus  $contactus
     * @return \Illuminate\Http\Response
     */
    public function show(contactus $contactus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\contactus  $contactus
     * @return \Illuminate\Http\Response
     */
    public function edit(contactus $contactus)
    {
        $this->authorize('update' , $contactus);

        return view ('contactus.edit', [
            'contactus' => contactus::find($contactus->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\contactus  $contactus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, contactus $contactus)
    {
        $this->authorize('update' , $contactus);

        request()->validate([
            'adress' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'social_media' => 'required',
        ]);

        $contactus = contactus::find($contactus->id);
        $contactus->user_id = auth()->user()->id;
        $contactus->adress = request('adress');
        $contactus->phone = request('phone');
        $contactus->email = request('email');
        $contactus->social_media = request('social_media');
        $contactus->save();

        return redirect('/contactus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\contactus  $contactus
     * @return \Illuminate\Http\Response
     */
    public function destroy(contactus $contactus)
    {
        //
    }
}
