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

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::resource('categories', 'CategoriesController');
    Route::resource('details', 'DetailsController');
    Route::get('/change-password','HomeController@changePasswordForm')->name('change-password');
    Route::post('/change-password','HomeController@changePassword')->name('change-password');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/search','SearchController@index')->name('search');
Route::get('/search-map','SearchController@map')->name('search-map');