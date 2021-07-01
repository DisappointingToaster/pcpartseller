<?php
use Illuminate\Support\Facades\Route;

Route::get('/','App\Http\Controllers\HomeController@index')->name('home');

Route::get('users/{user:username}/posts','App\Http\Controllers\UserPostController@index')->name('users.posts');

Route::get('dashboard/{user:username}','App\Http\Controllers\DashboardController@index')->name('dashboard');
Route::delete('dashboard/{post}','App\Http\Controllers\DashboardController@destroy')->name('dashboard.destroy');


Route::post('logout','App\Http\Controllers\LogoutController@deauth')->name('logout');

Route::get('login','App\Http\Controllers\LoginController@index')->name('login');
Route::post('login','App\Http\Controllers\LoginController@authuser');


Route::get('register','App\Http\Controllers\RegisterController@index')->name('register');
Route::post('register','App\Http\Controllers\RegisterController@store');

Route::get('posts','App\Http\Controllers\PostController@index')->name('posts');
Route::post('posts','App\Http\Controllers\PostController@store');

