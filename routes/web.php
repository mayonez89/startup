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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function() {
    Route::get('/edit-profile', 'ProfileController@edit')->name('edit-profile');
//    Route::get('/update-profile', 'ProfileController@updateProfile');
    Route::post('/update-profile', 'ProfileController@updateProfile');
    Route::post('/remove-interest', 'ProfileController@removeInterest');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users', 'HomeController@users')->name('users');
