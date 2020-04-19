@extends('layouts.home')
@section('title')
    news
@endsection
@section('content')
    <a href="/news" > <h1 class="mt-4 text-center" >News</h1> </a>
    <div class='container text-center'>
        <div class='row'>
            @foreach ($news as $article)
                <ul class=" col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-12 border text-center">
                    <div class=" mt-3 ">
                        <a href="/news/{{ $article->id }}"> <li><img src="/storage/{{ $article->image }}"   alt="" class='news_img img-fluid'></li></a>
                        <a href="/news/{{ $article->id }}"><li><h4 class="p-2"> {{ $article->title }} </h4></li> </a>
                    </div>
                </ul>
            @endforeach
        </div>
    </div>
    @can('edit_site')
        <a href="/news/create"> <button  class="btn btn-primary btn-sm mt-2 mr-2 float-right mt-3"> Create new article </button></a>.
    @endcan
@endsection