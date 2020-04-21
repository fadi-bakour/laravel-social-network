@extends('layouts.home')
@section('title')
    Contact us
@endsection
@section('content')
    <div class="mt-5 ">
        <div class="text-center">
            <a href="/contactus"> <h1>Contact us</h1> </a>
        </div>
        <div class="border ">
            <h3 class=" pl-1 m-3">{{ $contactus->adress }}</h3>
        </div>
        <div class="border ">
            <h3 class=" pl-1 m-3">{{ $contactus->phone }}</h3>
        </div>
        <div class="border ">
            <h3 class=" pl-1 m-3">{{ $contactus->email }}</h3>
        </div>
        <div class="border ">
            <h3 class=" pl-1 m-3"><a href="http://{{ $contactus->social_media }}">{{ $contactus->social_media }}</h3></a>
        </div>
    </div>
    @can('root')   
        <a href="/contactus/{{ $contactus->id }}/edit"> <button  class="btn btn-primary btn-sm mt-2 mr-2 float-right mt-3"> Edit  </button></a>
    @endcan
@endsection