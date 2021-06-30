<?php
use Illuminate\Support\Facades\Route;




Route::get('register','App\Http\Controllers\RegisterController@index')->name('register');
Route::post('register','App\Http\Controllers\RegisterController@store');

Route::get('/', function () {
    return view('posts.index');
});
