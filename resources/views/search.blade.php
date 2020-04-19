@extends('layouts.home')
@section('title')
    search
@endsection
@section('content')
<section class="mt-3">
    <form  method="get" action="/search" >
        @csrf
            <div class="input-group">
                <input type="search" name="search" id="search" class="form-control">
                <span class="input-group-prepend">
                    <button type="submit" class="btn btn-primary"> search</button>
                </span>
            </div>
    </form>
</section>

  <section class="mt-3 border">
    @foreach ($users as $user)
        <ul class="m-4">
            <a href="{{ route  ('profile', $user)}}">
                <li class ='float-left '><img src="/storage/{{ $user->image }}" class="rounded-circle avatar_friend" alt=""> </li>
            </a>
            <a href="{{ route  ('profile', $user)}}">
                <li class ='float-left pl-2 pt-2'> {{ $user->name }}</li>
            </a>
            <br>
            <br>
        </ul>
    @endforeach
</section>
@endsection
