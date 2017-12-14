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
Route::resource( '/test', 'UserController' );

Route::get( '/', 'BookController@index' )->name( 'index' );

Route::get( 'create', 'BookController@create' );
Route::post( 'test', 'BookController@store' );
Route::get( '{id}', 'BookController@show' )->name( 'book' );
Route::delete( '{id}', 'BookController@destroy' )->name( 'book' );
Route::get( 'returnBook/{id}', 'BookController@returnBook' );
Route::post( '/addUser/{id}', 'BookController@addUser' );
Route::get( '/select/{id}', 'BookController@selectBook' );
Route::get( "edit/{id}", 'BookController@edit' );
Route::put( "edit/{id}", 'BookController@update' );

