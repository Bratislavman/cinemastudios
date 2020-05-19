<?php
use Illuminate\Support\Facades\Route;

Route::post('auth', 'Main@auth');

Route::post('profile/{id}', 'Profile\Profile@index');

Route::middleware(['anonimus'])->group(function () {
    Route::post('login', 'Auth\LoginController@login');
    Route::post('register', 'Auth\RegisterController@register');
});

Route::middleware(['authorized'])->group(function () {
    Route::post('logout', 'Auth\LoginController@logout');
});

Route::middleware(['admin'])->group(function () {

});

Route::get('/', function () {
    return view('app');
});
Route::get('/{any?}', function ($any) {
    return view('app');
})->where('any', '.*');
