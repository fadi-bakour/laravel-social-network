@extends('layouts.home')
@section('content')
    <ul>
        <li><h3> {{ $tourismcities->title }} </h3></li>
        <li><h6> {{ $tourismcities->body }} </h6> </li>
    </ul>    
    <a href="/tourismcities/{{ $tourismcities->id }}/edit"> <button  class="btn btn-primary btn-sm mt-2 mr-2 float-right mt-3"> Edit article </button></a>
    
    <form action="/tourismcities/{{ $tourismcities->id }}" method="post">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger btn-sm mt-2 mr-2 float-right mt-3"> delete </button>
    </form>
@endsection