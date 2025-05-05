<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::group([
    'middleware' => 'guest',
], function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/register', [AuthController::class, 'regis']);
});

Route::group(['middleware' => 'auth'], function(){

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/', function () {
        return view('users.statistic');
    });
    Route::get('/dashboard', function () {
        return view('users.statistic');
    });
    
    Route::group([
        'prefix' => 'user',
    ], function () {
        Route::get('/profile', [UserController::class, 'index']);
        Route::put('/profile/edit', [UserController::class, 'update']);
        Route::put('/skills/edit', [UserController::class, 'updateSkills']);
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
    
    Route::group([
        'prefix' => 'company',
    ], function () {
        Route::get('/', function () {
            return view('company.index');
        });
    });
});