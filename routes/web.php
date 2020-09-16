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
Route::get('/conceptions/{conception}/edit', 'ConceptionController@edit')->middleware('can:update,conception');
Route::patch('/conceptions/{conception}', 'ConceptionController@update')->middleware('can:update,conception');
Route::get('/conceptions/{conception}', 'ConceptionController@show')->middleware('can:view,conception');



Route::get('/', 'ConceptionController@index')->name('home');

Route::get('/conceptions_en_attente', 'ConceptionController@crea_attente');
Route::get('/conceptions_en_cours', 'ConceptionController@crea_en_cours');
Route::get('/conceptions_validees', 'ConceptionController@crea_valide');



Route::get('/dashboard', 'ConceptionController@dashboard')->name('dashboard');

});

Auth::routes();

