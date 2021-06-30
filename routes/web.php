<?php
use Illuminate\Support\Facades\Route;

Route::get('dashboard','App\Http\Controllers\DashboardController@index')->name('dashboard');

Route::get('login','App\Http\Controllers\LoginController@index')->name('login');
Route::post('login','App\Http\Controllers\LoginController@authuser');


Route::get('register','App\Http\Controllers\RegisterController@index')->name('register');
Route::post('register','App\Http\Controllers\RegisterController@store');

Route::get('/', function () {
    return view('posts.index');
});
