<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\StudyGroupController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| AUTH ROUTES (Login & Register)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

/*
|--------------------------------------------------------------------------
| PROTECTED ROUTES (Login Required)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    // Dashboard Utama
    Route::get('/', [ScheduleController::class, 'index'])->name('home');

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/profile', [UserController::class, 'profileEdit'])->name('profile.edit');
    Route::put('/profile', [UserController::class, 'profileUpdate'])->name('profile.update');

    /*
    |----------------------------------------------------------------------
    | FITUR PEMINJAMAN (Murid/Guru)
    |----------------------------------------------------------------------
    */
    Route::get('/peminjaman-saya', [ScheduleController::class, 'mySchedules'])->name('schedules.mine');

    Route::resource('schedules', ScheduleController::class);
    /*
    |----------------------------------------------------------------------
    | KHUSUS ACC (Sarpras & OSIS)
    |----------------------------------------------------------------------
    */
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('studygroups', StudyGroupController::class);

        Route::controller(ScheduleController::class)->group(function () {
            Route::get('/antrean', 'antreanIndex')->name('antrean');
            Route::put('/schedules/{schedule}/approve', 'approve')->name('schedules.approve');
            Route::put('/schedules/{schedule}/reject', 'reject')->name('schedules.reject');
            Route::put('/schedules/{schedule}/return', 'returnRoom')->name('schedules.return');
    });
});

});
