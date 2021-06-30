<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('dashboard','App\Http\Controllers\DashboardController@index')->name('dashboard');

Route::post('logout','App\Http\Controllers\LogoutController@deauth')->name('logout');

Route::get('login','App\Http\Controllers\LoginController@index')->name('login');
Route::post('login','App\Http\Controllers\LoginController@authuser');


Route::get('register','App\Http\Controllers\RegisterController@index')->name('register');
Route::post('register','App\Http\Controllers\RegisterController@store');

Route::get('posts','App\Http\Controllers\PostController@index')->name('posts');
Route::post('posts','App\Http\Controllers\PostController@store');

