<?php

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

Route::get('/home', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/search', 'SearchController@index')->name('search');
Route::post('/search', 'SearchController@search');

Route::get('/user/{user}', 'ProfileController@profile');
Route::post('/user/{user}/like', 'ProfileController@like');
Route::post('/user/{user}/unlike', 'ProfileController@unlike');
Route::post('/user/{user}/rating/{value}', 'ProfileController@rating');
Route::post('/user/{user}/photo', 'ProfileController@photo');
