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

Route::prefix('studios')->group(function () {
    Route::post('/', 'Application\StudioController@index')->name('studios');
    Route::post('/{id}', 'Application\StudioController@studio')->name('studio');
});

Route::middleware(['admin'])->group(function () {
    Route::prefix('studios')->group(function () {
        Route::post('create', 'Fields\StudioController@create')->name('studioCreate');
        Route::post('{id}/update', 'Fields\StudioController@update')->name('studioUpdate');
        Route::post('{id}/delete', 'Fields\StudioController@delete')->name('studioDelete');
    });
});

Route::get('/', function () {
    return view('app');
});
Route::get('/{any?}', function ($any) {
    return view('app');
})->where('any', '.*');
