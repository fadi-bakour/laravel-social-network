<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('News.index', [
            'news' => News::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view ('News.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        request()->validate([
            'image' => 'required',
            'title' => 'required',
            'body' => 'required',
            
            ]);

        $article = new \App\News;
        $article->user_id = auth()->user()->id;
        if  (request('image') != null){
            $article->image = request('image')->store('news');
        }
        $article->title = request('title');
        $article->body = request('body');
        $article->save();

        return redirect('/news');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        return view ('news.show', [
            'news' => \App\news::find($news->id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $this->authorize('update' , $news);

        return view ('news.edit', [
            'news' => \App\news::find($news->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $this->authorize('update' , $news);

        request()->validate([
            'title' => 'required',
            'body' => 'required',
            ]);

        $news = \App\news::find($news->id);
            
        if  (request('image') != null){
            $news->image = request('image')->store('news');
        }
        $news->user_id = auth()->user()->id;
        $news->title = request('title');
        $news->body = request('body');
        $news->save();
        return redirect('/news');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {   
        $this->authorize('delete' , $news);

        $news = \App\news::find($news->id);
        $news->delete();

        return redirect('/news');
    }
}
