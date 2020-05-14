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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('movies')->group(function () {
    Route::post('/', 'MovieController@index')->name('movies');
    Route::post('/create', 'MovieController@create')->name('createMovie');
    Route::patch('/{movie}/update', 'MovieController@update')->name('updateMovie');
});

Route::prefix('studios')->group(function () {
    Route::post('/', 'StudioController@index')->name('studios');
    Route::post('/create', 'StudioController@create')->name('createStudio');
    Route::patch('/{studio}/update', 'StudioController@update')->name('updateStudio');
});
