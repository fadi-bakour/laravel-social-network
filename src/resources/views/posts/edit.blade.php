@extends('layouts.home')
@section('content')
    <ul class=""> 

        <li class="pt-3 pl-2">
            <img src="/storage/{{ $posts->image }}" class=" img-fluid "   alt="" >
        </li>
        
        <li>
            <form action="/posts/ {{ $posts->id }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
            
                <div class=" ">
                    <label for="body"></label>
                    <textarea class="form-control" name="body" id="body" cols="25" rows="4"> {{$posts->body}}</textarea>
                </div>

                <div class="ml-2 mt-1 float-left">
                    <label class="" for="image" > <img class="addimage" src="/img/Choose image.png" alt=""> </label>
                    <input class="custom-file-input " type="file" name="image" id="image">
                </div>
            
                <button type="submit" class="btn btn-primary btn-sm mt-2 mr-2 float-right mt-3"> Update </button>
            </form>
        </li>
    </ul>
@endsection