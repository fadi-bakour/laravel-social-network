@extends('layouts.home')
@section('title')
    profile/{{ $user->name }}
@endsection
@section('content')

    <section>
        <ul class="cover">
            <li>
                <img src="/storage/{{ $user->cover }}" alt="" class ='img-fluid cover_img' >
            </li>

            <li class=" profile_img_div">
                <img src="/storage/{{ $user->image }}" class="avatar rounded-circle  img-thumbnail"   alt="" >
        
            </li>

        </ul>
    </section>

    <section class="mt-n3">
        <div >

            @if (auth()->user()->isnot($user) )
                <form action="/profile/{{ $user->username}}/follow" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary btn-sm mt-2 mr-2 float-right "> 
                        {{ auth()->user()->following($user) ? 'unfollow' : 'follow' }}    
                    </button>
                </form>
            
            @endif

            @if (auth()->user()->is($user) )

            <a href="/profile/{{ $user->username }}/edit"><button type="" class="btn btn-outline-primary btn-sm mt-2 mr-2 float-right "> edit profile </button> </a>
            
            @endif
        </div>
    </section>

    <section class="float-left pl-2">
        <a href="/profile/{{ $user->username }}"><button type="" class="btn btn-outline-primary btn-sm mt-2 mr-2 float-right "> {{ $user->name }} </button> </a>
    </section>

    <section class="pt-5">
        @if (auth()->user()->is($user))
            @include('newpost')
        @endif
    </section>

    <section class="mt-4">
        @include('feed')
    </section>

@endsection

