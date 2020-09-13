<?php

use Illuminate\Support\Facades\Route;

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



Route::get('/form', function () {
    return view('form');
});

Route::middleware('auth')->group(function(){
Route::post('/conceptions', 'ConceptionController@store');

Route::get('/conceptions/{conception}/edit', 'ConceptionController@edit');
Route::patch('/conceptions/{conception}', 'ConceptionController@update');
Route::get('/conceptions/{conception}', 'ConceptionController@show');

Route::get('/', 'ConceptionController@index');

Route::get('/conceptions', 'ConceptionController@index')->name('home');
});

Auth::routes();

Route::get('/conceptions', 'ConceptionController@index')->name('conceptions');
