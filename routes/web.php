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

Route::get('/','App\Http\Controllers\TweetController@index');
Route::post('/','App\Http\Controllers\TweetController@create');
Route::get('/tweet/{id}/show','App\Http\Controllers\TweetController@show')->name('tweet_show');
Route::get('/tweet/delete','App\Http\Controllers\TweetController@delete');
Route::post('/tweet/{id}/remove','App\Http\Controllers\TweetController@remove')->name('remove');
Route::get('/users/index','App\Http\Controllers\FollowController@index')->name('follow_all');;
Route::post('users/{user}/follow', 'App\Http\Controllers\FollowController@follow')->name('follow');
Route::delete('users/{user}/unfollow', 'App\Http\Controllers\FollowController@unfollow')->name('unfollow');
Route::get('users/{user_id}/show', 'App\Http\Controllers\UserController@show')->name('show');
Route::get('users/{user_id}/myprofile', 'App\Http\Controllers\UserController@myprofile')->name('myprofile');
Route::get('users/{user_id}/edit', 'App\Http\Controllers\UserController@edit')->name('user_edit');
Route::get('users/{user_id}/following_user', 'App\Http\Controllers\FollowController@following')->name('following_user');
Route::get('users/{user_id}/followed_user', 'App\Http\Controllers\FollowController@followed')->name('followed_user');
Route::post('users/{user_id}/update', 'App\Http\Controllers\UserController@update')->name('user_update');
Route::post('tweet/{tweet}/favorite', 'App\Http\Controllers\TweetController@favorite')->name('favorite');
Route::delete('tweet/{tweet}/unfavorite', 'App\Http\Controllers\TweetController@unfavorite')->name('unfavorite');
Auth::routes();

