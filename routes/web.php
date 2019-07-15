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

Route::get('/', 'PagesController@index')->name('home');
Route::get('/linqz', 'LinksController@index')->name('linqz');
Route::post('/linqz', 'LinksController@store');
Route::get('/find/linqz/{slug}', 'LinksController@find');
Route::get('/dashboard', 'AccountController@index')->name('dashboard');
Auth::routes();

//Always keep slug route last to ensure above routes will always resolve correctly.
//Insertion check on available routes also ensures slug with above routes cannot be created.

Route::get('/{slug}', 'LinksController@show');

