<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});
Route::get('/dashboard', function () {
    return view('users.statistic');
});

Route::group([
    'middleware' => 'guest',
], function () {
    Route::get('/login', function () {
        return view('auth.login');
    });
    Route::get('/register', function () {
        return view('auth.register');
    });
});

Route::group([
    'prefix' => 'profile',
], function () {
    Route::get('/', function () {
        return view('users.index');
    });
});
Route::group([
    'prefix' => 'project',
], function () {
    Route::get('/', function () {
        return view('projects.index');
    });
    Route::get('/create', function () {
        return view('projects.create');
    });
});
