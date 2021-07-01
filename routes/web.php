<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
Route::get('/','App\Http\Controllers\HomeController@index')->name('home');

Route::get('users/{user:username}/posts','App\Http\Controllers\UserPostController@index')->name('users.posts');

Route::get('dashboard/{user:username}','App\Http\Controllers\DashboardController@index')->name('dashboard');
Route::delete('dashboard/{post}','App\Http\Controllers\DashboardController@destroy')->name('dashboard.destroy');
Route::get('dashboard/edit/{post}','App\Http\Controllers\DashboardController@edit')->name('dashboard.edit');
Route::post('dashboard/edit/{post}','App\Http\Controllers\DashboardController@update')->name('dashboard.update');

Route::post('logout','App\Http\Controllers\LogoutController@deauth')->name('logout');

Route::get('login','App\Http\Controllers\LoginController@index')->name('login');
Route::post('login','App\Http\Controllers\LoginController@authuser');


Route::get('register','App\Http\Controllers\RegisterController@index')->name('register');
Route::post('register','App\Http\Controllers\RegisterController@store');

Route::get('posts','App\Http\Controllers\PostController@index')->name('posts');
Route::post('posts','App\Http\Controllers\PostController@store');

Route::get('/lang/{lang}', 'App\Http\Controllers\LocalizationController@index');

