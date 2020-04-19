@extends('layouts.home')
@section('title')
    About malaysia
@endsection
@section('content')
    <div class="mt-5 ">
        
        <div class="text-center">
            <a href="/aboutmalaysia"> <h1>About Malaysia</h1> </a>
        </div>

        <div class=""> 
            <img src="/storage/{{ $aboutmalaysias->image }}" class=" img-fluid"   alt="" >
        </div>

        <div class="border mt-3">
            <h3 class="m-2">{{ $aboutmalaysias->body }}</h3>
        </div>

        @can('root')   
            <a href="/aboutmalaysia/{{ $aboutmalaysias->id }}/edit"> <button  class="btn btn-primary btn-sm mt-2 mr-2 float-right mt-3"> Edit article </button></a>
        @endcan
        
    </div>

@endsection