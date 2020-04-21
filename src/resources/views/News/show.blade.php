@extends('layouts.home')
@section('title')
    news/{{ $news->title }}
@endsection
@section('content')
    <ul>
        <li><h3> {{ $news->title }} </h3></li>
        <li><img src="/storage/{{ $news->image }}" class=" img-fluid"   alt="" ></li>
        <li class="border mt-2"><h6 class="p-2"> {{ $news->body }} </h6> </li>
    </ul> 
    @can('edit_site')   
        <a href="/news/{{ $news->id }}/edit"> <button  class="btn btn-primary btn-sm mt-2 mr-2 float-right mt-3"> Edit article </button></a>
        <form action="/news/{{ $news->id }}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger btn-sm mt-2 mr-2 float-right mt-3"> delete </button>
        </form>
    @endcan
@endsection