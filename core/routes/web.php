<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BadgeProjectController;
use App\Http\Controllers\BadgeTaskController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CompanyPositionController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserStatisticController;
use Illuminate\Support\Facades\Route;


Route::group([
    'middleware' => 'guest',
], function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/register', [AuthController::class, 'regis']);
});

Route::get('/user/join-company/{id}', [UserController::class, 'updateCompanyUser']);

Route::group(['middleware' => 'auth'], function () {

    Route::post('/logout', [AuthController::class, 'logout']);
    Route::resource('/company', CompanyController::class)->except(['update', 'destroy'])->middleware('isHaveCompany');
    Route::resource('/message', MessageController::class)->except(['edit', 'update', 'index']);
    
    Route::group(['middleware' => 'onboarding'], function () {
        Route::get('/', [UserStatisticController::class, 'taskProgress']);
        Route::group([
            'prefix' => 'dashboard',
        ], function () {
            Route::get('/', [UserStatisticController::class, 'taskProgress']);
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
            Route::get('/my-task', [TaskController::class, 'index']);
            Route::post('create', [TaskController::class, 'store']);
            Route::put('/{task_id}', [TaskController::class, 'updateTask']);
            Route::delete('/{task_id}', [TaskController::class, 'destroy']);
            Route::post('/{task_id}/update-working-hour', [TaskController::class, 'updateWorkingHour'])->name('tasks.update-working-hour');
            Route::post('/{task_id}/update-list-name', [TaskController::class, 'updateTaskStatus'])->name('tasks.update-list-name');
        });

        Route::resource('/project', ProjectController::class);
        Route::put('/project/member/{id}', [ProjectController::class, 'updateTeamMember']);
        
        Route::get('/my-company', [CompanyController::class, 'companyUser']);
        Route::put('/company/{id}', [CompanyController::class, 'update']);
        Route::post('/user/invite-company/{id}', [CompanyController::class, 'joinCompany']);
        Route::resource('/company-position', CompanyPositionController::class)->except(['show', 'edit']);

        Route::resource('/badge-project', BadgeProjectController::class)->except(['index','create','edit', 'show']);
        Route::resource('/badge-task', BadgeTaskController::class)->except(['index','create','edit', 'show']);
        Route::get('/message', [MessageController::class, 'index']);
    });

});