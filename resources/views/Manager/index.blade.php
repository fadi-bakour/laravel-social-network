@extends('layouts.home')
@section('content')
    @foreach ($user as $user)
        @if ($user->roles()->pluck('name') == '[]')

        @else
            <ul class="border text-center">
                <li class="mt-2 ml-5 mr-5 float-left">
                    <h3>username</h3>
                    <h5>{{$user->username }}</h5>
                </li>
                <li class="mt-2">
                    <h3> Role</h3>
                    @foreach ($user->roles()->pluck('name') as $role)
                        <h5>{{$role}}</h5>
                    @endforeach
                </li>

                <li class="text-right m-2">
                    <a href="/manager/{{$user->username }}/edit"> <button  class="btn btn-primary btn-sm "> Edit </button></a>
                </li>

                <li class="text-right m-2">
                    <form action="/manager/{{$user->username }}" method="post">
                        @csrf
                        @method('delete')

                        <button  class="btn btn-danger btn-sm "> Delete </button>
                    </form>
                </li>

            </ul> 
        @endif

    @endforeach

    @can('root')   
        <a href="/manager/create"> <button  class="btn btn-primary btn-sm mt-2 mr-2 float-right mt-3"> Add a Role </button></a>
    @endcan



@endsection
