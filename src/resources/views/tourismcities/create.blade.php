@extends('layouts.home')
@section('content')
<form action="/tourismcities" method="post">
    @csrf
    
    <div class="mr-5 mt-3">
        <label for="title"><h6>Article title</h6></label>
        <textarea class="form-control" name="title" id="title" cols="25" rows="2"></textarea>
    </div>

    <div class="mr-5 mt-3">
        <label for="body"><h6>Article body </h6></label>
        <textarea class="form-control" name="body" id="body" cols="30" rows="8"></textarea>
    </div>
    <button type="submit" class="btn btn-primary btn-sm mt-2 mr-2 float-right mt-3"> post </button>
</form>
@endsection
