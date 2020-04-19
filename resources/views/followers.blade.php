@extends('layouts.home')
@section('title')
    Followers
@endsection
@section('content')
    <section>
        <div>
            <a href="/followers" > <h1 class="mt-4 text-center" >Followers</h1> </a>
        </div>
        <div class="border">
            @foreach (auth()->user()->beingfollowed as $user)
                <ul class="mt-2 ml-2">
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
        </div>
    </section>
@endsection