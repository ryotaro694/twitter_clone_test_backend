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
Route::get('/tweet/edit','App\Http\Controllers\TweetController@edit');
Route::post('/tweet/update','App\Http\Controllers\TweetController@update');
Route::get('/tweet/delete','App\Http\Controllers\TweetController@delete');
Route::post('/tweet/remove','App\Http\Controllers\TweetController@remove');
Route::get('/user/login','App\Http\Controllers\UserController@getAuth');
Route::post('/user/login','App\Http\Controllers\UserController@postAuth');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

