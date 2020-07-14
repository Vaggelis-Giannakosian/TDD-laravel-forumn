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

Route::get('/home', 'HomeController@index')->name('home');



Route::get('/threads','ThreadsController@index')->name('threads.index');
Route::post('/threads','ThreadsController@store')->name('threads.store');
Route::get('/threads/create','ThreadsController@create')->name('threads.create');
Route::get('/threads/{channel:slug}/{thread}','ThreadsController@show')->name('threads.show');

//Route::resource('threads','ThreadsController');

Route::post('/threads/{channel:slug}/{thread}/replies','RepliesController@store')->name('replies.store');