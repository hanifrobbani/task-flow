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


// ==========================================
// GUEST ROUTES (Authentication)
// ==========================================
Route::group(['middleware' => 'guest'], function () {
    // Authentication Routes
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'regis']);
    Route::post('/register', [AuthController::class, 'register']);
});

// ==========================================
// PUBLIC ROUTES (No Auth Required)
// ==========================================
Route::get('/user/join-company/{id}', [UserController::class, 'updateCompanyUser']);

// ==========================================
// AUTHENTICATED ROUTES
// ==========================================
Route::group(['middleware' => 'auth'], function () {

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Company Creation (Before Onboarding)
    Route::get('/company', [CompanyController::class, 'index'])->middleware('isHaveCompany');
    // Route::get('/company/{id}', [CompanyController::class, 'show'])->middleware('isHaveCompany');
    
    Route::post('/request-join-company', [MessageController::class, 'requestJoinCompany'])->middleware('isHaveCompany');
    // ==========================================
    // ONBOARDED USER ROUTES
    // ==========================================
    Route::group(['middleware' => 'onboarding'], function () {

        // Dashboard Routes
        Route::get('/', [UserStatisticController::class, 'taskProgress'])->name('home');
        Route::prefix('dashboard')->group(function () {
            Route::get('/', [UserStatisticController::class, 'taskProgress'])->name('dashboard');
        });

        // ==========================================
        // USER MANAGEMENT
        // ==========================================
        Route::prefix('user')->name('user.')->group(function () {
            Route::get('/profile', [UserController::class, 'index'])->name('profile');
            Route::put('/profile/edit', [UserController::class, 'update'])->name('profile.update');
            Route::put('/skills/edit', [UserController::class, 'updateSkills'])->name('skills.update');
            Route::get('/setting', function () {
                return view('users.setting');
            })->name('setting');
        });

        // ==========================================
        // PROJECT MANAGEMENT
        // ==========================================
        Route::prefix('project')->name('project.')->group(function () {
            Route::get('/{id}/kanban', [ProjectController::class, 'kanbanProject'])->name('kanban');
        });

        Route::resource('/project', ProjectController::class)->names('project');
        Route::put('/project/member/{id}', [ProjectController::class, 'updateTeamMember'])
            ->name('project.member.update');

        // ==========================================
        // TASK MANAGEMENT
        // ==========================================
        Route::prefix('task')->name('task.')->group(function () {
            Route::get('/my-task', [TaskController::class, 'index'])->name('my');
            Route::post('/create', [TaskController::class, 'store'])->name('store');
            Route::put('/{task_id}', [TaskController::class, 'updateTask'])->name('update');
            Route::delete('/{task_id}', [TaskController::class, 'destroy'])->name('destroy');
            Route::post('/{task_id}/update-working-hour', [TaskController::class, 'updateWorkingHour'])
                ->name('update-working-hour');
            Route::post('/{task_id}/update-list-name', [TaskController::class, 'updateTaskStatus'])
                ->name('update-status');
        });

        // ==========================================
        // COMPANY MANAGEMENT
        // ==========================================
        Route::prefix('company')->group(function () {
            Route::get('/my-company', [CompanyController::class, 'companyUser']);
            Route::put('/{id}', [CompanyController::class, 'update'])->name('update');
            Route::post('/user/invite-company/{id}', [CompanyController::class, 'joinCompany']);
        });

        // Company Position Management
        Route::resource('/company-position', CompanyPositionController::class)
            ->except(['show', 'edit']);

        // ==========================================
        // BADGE MANAGEMENT
        // ==========================================
        Route::resource('/badge-project', BadgeProjectController::class)
            ->except(['index', 'create', 'edit', 'show'])
            ->names('badge.project');

        Route::resource('/badge-task', BadgeTaskController::class)
            ->except(['index', 'create', 'edit', 'show'])
            ->names('badge.task');

        // ==========================================
        // MESSAGE SYSTEM
        // ==========================================
        Route::prefix('message')->name('message.')->group(function () {
            Route::get('/', [MessageController::class, 'index'])->name('index');
            Route::get('/sent', [MessageController::class, 'sentMessage'])->name('sent');
            Route::get('/company', [MessageController::class, 'messageCompany']);
        });
    });
});