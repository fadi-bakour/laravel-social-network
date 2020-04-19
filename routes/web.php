<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/profile/{user}', 'profilescontroller@index')->name('profile');
Route::get('/profile/{user}/edit', 'profilescontroller@edit');
Route::put('/profile/{user}', 'profilescontroller@update');
Route::get('/search', 'profilescontroller@search');

Route::post('/posts', 'postscontroller@store');
Route::get('/posts/{posts}/edit', 'postscontroller@edit');
Route::put('/posts/{posts}', 'postscontroller@update');
Route::delete('/posts/{posts}', 'postscontroller@destroy');

Route::post('/posts/{posts}/like', 'likecontroller@store');
Route::delete('/posts/{posts}/like', 'likecontroller@destroy');


Route::post('/comment/{post}', 'commentscontroller@store');
Route::get('/comment/{comments}/edit', 'commentscontroller@edit');
Route::put('/comment/{comments}', 'commentscontroller@update');
Route::delete('/comment/{comments}', 'commentscontroller@destroy');

Route::get('/notifications', 'newfollowercontroller@index');

Route::get('/explore', function(){
    return view ('explore' , [
        'users' => App\User::latest()->get()->sortBy('name')
    ]);
});

Route::post('/profile/{user}/follow', 'followcontroler@store');

Route::get('/following', 'followingController@index');

Route::get('/followers', 'followersController@index')->name('followers');

Route::get('/news', 'NewsController@index');
Route::get('/news/create', 'NewsController@create')->middleware('can:edit_site');
Route::post('/news', 'NewsController@store')->middleware('can:edit_site');
Route::get('/news/{news}', 'NewsController@show');
Route::get('/news/{news}/edit', 'NewsController@edit')->middleware('can:edit_site');
Route::put('/news/{news}', 'NewsController@update')->middleware('can:edit_site');
Route::delete('/news/{news}', 'NewsController@destroy')->middleware('can:edit_site'); 

Route::get('/aboutmalaysia', 'aboutmalaysiaController@index');
Route::get('/aboutmalaysia/{aboutMalaysia}/edit', 'aboutmalaysiaController@edit')->middleware('can:root');
Route::put('/aboutmalaysia/{aboutMalaysia}', 'aboutmalaysiaController@update')->middleware('can:root');

Route::get('/contactus', 'ContactusController@index');
Route::get('/contactus/{contactus}/edit', 'ContactusController@edit')->middleware('can:root');
Route::put('/contactus/{contactus}', 'ContactusController@update')->middleware('can:root');

Route::get('/manager', 'ManagerController@index')->middleware('can:root' );
Route::get('/manager/create', 'ManagerController@create')->middleware('can:root' );
Route::post('/manager', 'ManagerController@store')->middleware('can:root' );
Route::get('/manager/{user}/edit', 'ManagerController@edit')->middleware('can:root' );
Route::put('/manager/{user}', 'ManagerController@update')->middleware('can:root' );
Route::delete('/manager/{user}', 'ManagerController@destroy')->middleware('can:root' );


