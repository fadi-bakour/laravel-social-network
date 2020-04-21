@extends('layouts.home')
@section('content')
    <form action="/profile/{{ auth()->user()->username }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <h3 class ="mt-3"> Edit profile information</h3>

        <div class="custom-file mt-3  mr-5 pr-5">
            <label class="custom-file-label" for="cover" > <h5>cover_image</h5> </label>
            <input class="custom-file-input" type="file" name="cover" id="cover">
        </div>

        <div class="pt-3 pl-2">
            <img src="/storage/{{ auth()->user()->cover }}" class=" img-fluid "   alt="" >
        </div>

        <div class="custom-file mt-3  mr-5 pr-5 ">
            <label class="custom-file-label" for="image" > <h5>Image</h5> </label>
            <input class="custom-file-input" type="file" name="image" id="image">
        </div>

        <div class="pt-3 pl-2">
            <img src="/storage/{{ auth()->user()->image }}" class=" img-fluid "   alt="" >
        </div>

        <div class="mt-3  mr-5 pr-5">
            <label for="name" > <h5>Name</h5> </label>
            <textarea class ="form-control" name="name" id="name" cols="30" rows="1" required> {{ auth()->user()->name }}</textarea>
        </div>
        @error('name')
            <p class="text-danger " >{{ $message }}</p>
        @enderror

        <div class=" mt-3 mr-5 pr-5" >
            <label for="email" ><h5>email</h5></label>
            <input class =" form-control" name="email" id="email" cols="30" rows="1" type="email" value="{{ auth()->user()->email }}" required>
        </div>
        @error('name')
            <p class="text-danger " >{{ $message }}</p>
        @enderror

        <div class="mt-3 mr-5 pr-5" >
            <label for="password" ><h5>password</h5></label>
            <input class =" form-control" name="password" id="password" type="password" cols="30" rows="1" required>
        </div>
        @error('password')
            <p class="text-danger " >{{ $message }}</p>
        @enderror

        <div class="mt-3  mr-5 pr-5" >
            <label for="password_confirmation" ><h5>confirm password"</h5></label>
            <input class ="form-control" name="password_confirmation" id="password_confirmation" type="password" cols="30" rows="1">
        </div>
        <button type="submit" class="btn btn-primary btn-sm mt-2 mr-2 float-right mt-3"> Update </button>

    </form>
@endsection