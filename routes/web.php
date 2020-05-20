<?php
use Illuminate\Support\Facades\Route;

Route::post('auth', 'Main@auth');

Route::middleware(['anonimus'])->group(function () {
    Route::post('login', 'Auth\LoginController@login');
    Route::post('register', 'Auth\RegisterController@register');
});

Route::middleware(['authorized'])->group(function () {
    Route::post('logout', 'Auth\LoginController@logout');
});

Route::prefix('studio')->group(function () {
    Route::post('/', 'Application\StudioController@index');
    Route::post('/{id}', 'Application\StudioController@studio');
});

Route::middleware(['admin'])->group(function () {
    Route::prefix('studio')->group(function () {
        Route::post('create', 'Fields\StudioController@create');
        Route::post('{id}/update', 'Fields\StudioController@update');
        Route::post('{id}/delete', 'Fields\StudioController@delete');
    });
});

Route::get('/', function () {
    return view('app');
});
Route::get('/{any?}', function ($any) {
    return view('app');
})->where('any', '.*');
