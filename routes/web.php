<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WorkoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;

Route::middleware(['auth'])->group(function () {
    Route::controller(HomeController::class)->group(function () {

    });
});

Route::middleware(['guest'])->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('login', 'index')->name('login');
        Route::get('alterar/senha', 'changePassword')->name('change.password');
    });

    Route::controller(HomeController::class)->group(function () {
        Route::get('/', 'index')->name('home');
        Route::get('/adm', 'adm')->name('adm');
    });

    Route::controller(WorkoutController::class)->group(function () {
        Route::get('/treino', 'index')->name('workout');
    });

    Route::controller(ProfileController::class)->group(function () {
        Route::get('/perfil', 'index')->name('profile');
    });

    Route::controller(StudentController::class)->group(function () {
        Route::get('/aluno', 'index')->name('student');
    });
});
