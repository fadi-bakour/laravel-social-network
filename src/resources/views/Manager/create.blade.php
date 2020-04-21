@extends('layouts.home')
@section('content')
    <h3>Add a Role</h3>
    <form action="/manager" method="post">
        @csrf

        <div>
            <label for="username">input username</label>
            <textarea class="form-control" name="username" id="username" cols="30" rows="1"></textarea>
        </div>

        @error('username')
            <p class="text-danger " >{{ $message }}</p>
        @enderror

        
        <div class=" my-1">
            <label class="mr-sm-2" for="role">Select a Role</label>
            <select class="custom-select mr-sm-2" id="role" name="role">
                <option selected>choose</option>
                <option value="1">Manager</option>
                <option value="2">Admin</option>
            </select>
        </div>

        @error('role')
            <p class="text-danger " >{{ $message }}</p>
        @enderror

        <button type="submit" class="btn btn-primary btn-sm mt-2 mr-2 float-right mt-3"> create </button>      
    </form>


@endsection