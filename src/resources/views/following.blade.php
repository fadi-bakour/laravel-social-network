@extends('layouts.home')
@section('title')
    Following
@endsection
@section('content')
    <section>
        <div>
            <a href="/following" > <h1 class="mt-4 text-center" >Following</h1> </a>
        </div>
            <div class="border">
                @foreach (auth()->user()->follows as $user)
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