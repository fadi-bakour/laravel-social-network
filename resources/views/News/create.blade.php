@extends('layouts.home')
@section('content')
<form action="/news" method="post" enctype="multipart/form-data">
    @csrf
    
    @error('image')
        <p class="text-danger " >{{ $message }}</p>
    @enderror

    <div class="mr-5 mt-3">
        <label for="title"><h6>Article title</h6></label>
        <textarea class="form-control" name="title" id="title" cols="25" rows="2"></textarea>
    </div>
    @error('title')
        <p class="text-danger " >{{ $message }}</p>
    @enderror

    <div class="mr-5 mt-3">
        <label for="body"><h6>Article body </h6></label>
        <textarea class="form-control" name="body" id="body" cols="30" rows="8"></textarea>
    </div>
    
    @error('body')
        <p class="text-danger " >{{ $message }}</p>
    @enderror

    <div class="ml-2 mt-1 float-left">
        <label class="" for="image" > <img class="addimage" src="/img/Choose image.png" alt=""> </label>
        <input class="custom-file-input " type="file" name="image" id="image">
    </div>

    <button type="submit" class="btn btn-primary btn-sm mt-2 mr-2 float-right mt-3"> post </button>
</form>
@endsection
