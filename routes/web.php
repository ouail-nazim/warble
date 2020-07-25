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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::middleware('auth')->group(function (){
    Route::get('/home', 'TweetController@index')->name('home');
    Route::post('/poseTweet', 'TweetController@store')->name('post-tweet');
    Route::post('/profiles/{user:username}/follow', 'FollowController@store')->name('follow');
    Route::get('/profiles/{user:username}/edit', 'ProfilesController@edit')->name('edit');
    Route::patch('/profiles/{user:username}/update', 'ProfilesController@update')->name('update');
    Route::get('/explore','ExploreController@index')->name('explore');
    Route::post('/tweets/{tweet:id}/like', 'TweetController@like')->name('like');
    Route::delete('/tweets/{tweet:id}/like', 'TweetController@dislike')->name('like');
    Route::get('/profiles/search','ExploreController@search')->name('search');
    Route::delete('/tweets/{tweet:id}/delete', 'TweetController@delete')->name('delete');
    Route::get('/profiles/{user:username}','ProfilesController@show')->name('profile');
    Route::get('/messages','MessageController@index')->name('messages');
    Route::get('/messages/{id}','MessageController@show');
    Route::post('/messages/send','MessageController@send');

});



