@extends('layouts.home')
@section('content')
    <a href="/tourismcities"> <h1 class="mt-4  text-center p-2" >Tourism cities</h1> </a>

    <ul class="mt-4">
        @foreach ($tourismcities as $city)
            <a href="/tourismcities/{{ $city->id }}"><li><h3> {{ $city->title }} </h3></li> </a>
            <li><h6> {{ $city->body }} </h6> </li>
            <hr>
        @endforeach
    </ul>
    <a href="/tourismcities/create"> <button  class="btn btn-primary btn-sm mt-2 mr-2 float-right mt-3"> Create new article </button></a>

@endsection