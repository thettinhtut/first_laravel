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
// Route::get('/','HomeController@index');

Route::resource('receipe','ReceipeController');
// Route::get('receipe','ReceipeController@index');
// Route::get('receipe/create','ReceipeController@createReceipeForm');
// Route::get('receipe/{id}','ReceipeController@show');
// Route::post('receipe','ReceipeController@create');
// Route::get('receipe/{id}/edit','ReceipeController@edit');
// Route::patch('receipe/{id}','ReceipeController@update');
// Route::delete('receipe/{id}','ReceipeController@delete');



