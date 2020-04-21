@extends('layouts.home')
@section('content')
<form action="/contactus/ {{ $contactus->id }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')

    <div class="mr-5 mt-3">
        <label for="body"><h6>adress </h6></label>
        <input class="form-control" name="adress" id="adress" cols="30" rows="8" value="{{ $contactus->adress }}" required> 
    </div>
    @error('body')
        <p class="text-danger " >{{ $message }}</p>
    @enderror

    <div class="mr-5 mt-3">
        <label for="phone"><h6>phone </h6></label>
        <input class="form-control" name="phone" id="phone" cols="30" rows="8" value="{{ $contactus->phone }} " required> 
    </div>
    @error('phone')
        <p class="text-danger " >{{ $message }}</p>
    @enderror

    <div class="mr-5 mt-3">
        <label for="email"><h6>email </h6></label>
        <input class="form-control" name="email" id="email" cols="30" rows="8" value="{{ $contactus->email }}" required> 
    </div>
    @error('email')
        <p class="text-danger " >{{ $message }}</p>
    @enderror

    <div class="mr-5 mt-3">
        <label for="social_media"><h6>social_media </h6></label>
        <input class="form-control" name="social_media" id="social" cols="30" rows="8" value="{{ $contactus->social_media }}" required> 
    </div>
    @error('social_media')
        <p class="text-danger " >{{ $message }}</p>
    @enderror



    <button type="submit" class="btn btn-primary btn-sm mt-2 mr-2 float-right mt-3"> Update </button>
</form>
@endsection