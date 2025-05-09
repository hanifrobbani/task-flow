<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
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
        Route::get('/{id}/kanban', [ProjectController::class, 'kanbanProject']);
    });
    Route::group([
        'prefix' => 'task',
    ], function () {
        Route::post('create', [TaskController::class, 'store']);
    });

    Route::resource('/project', ProjectController::class);
    Route::put('/project/member/{id}', [ProjectController::class, 'updateTeamMember']);;
    
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