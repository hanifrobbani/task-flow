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
    'prefix' => 'user',
], function () {
    Route::get('/profile', function () {
        return view('users.index');
    });
    Route::get('/setting', function () {
        return view('users.setting');
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
    Route::get('/kanban', function () {
        return view('projects.kanban');
    });
    Route::get('/detail', function () {
        return view('projects.detail');
    });

    // kanban: /project/id/kanban
    // detail: /project/id/detail (button detail ada di kanban project)
});

Route::group([
    'prefix' => 'my-task',
], function () {
    Route::get('/', function () {
        return view('tasks.index');
    });
});