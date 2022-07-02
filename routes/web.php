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


Route::get('/','HomeController@index')->name('home');
Route::get('/post/{slug}','HomeController@show')->name('post.show');
Route::get('/create/post','HomeController@create')->name('post.create');
Route::post('/add/post','HomeController@store')->name('post.store');
Route::get('/edit/post/{slug}','HomeController@edit')->name('post.edit');
Route::post('/update/post/{slug}','HomeController@update')->name('post.update');
Route::delete('/delete/post/{slug}','HomeController@delete')->name('post.delete');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return redirect ('/');
});
