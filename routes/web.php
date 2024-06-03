<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WorkoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ExerciseController;

Route::middleware(['auth'])->group(function () {
    Route::controller(HomeController::class)->group(function () {
        Route::get('/', 'index')->name('home');
        Route::get('/adm', 'adm')->name('adm');
    });

    Route::controller(WorkoutController::class)->group(function () {
        Route::get('/treino', 'index')->name('workout');
        Route::post('/treino', 'editWorkout')->name('workout.edit');
    });

    Route::controller(ExerciseController::class)->group(function () {
        Route::get('/adm/exercicios', 'adm')->name('workout.adm');
        Route::post('/adicionar/exercicio', 'newExercise')->name('new.exercise');
        Route::post('/editar/exercicio', 'editExercise')->name('edit.exercise');
    });

    Route::controller(UserController::class)->group(function () {
        Route::post('/adicionar/usuario', 'newUser')->name('new.user');
        Route::post('/editar/usuario', 'editUser')->name('edit.user');
    });

    Route::controller(StudentController::class)->group(function () {
        Route::get('/aluno', 'index')->name('student');
        Route::post('/adicionar/aluno', 'newStudent')->name('student.new');
        Route::post('/editar/aluno', 'editStudent')->name('student.edit');
    });

    Route::controller(ProfileController::class)->group(function () {
        Route::get('/perfil', 'index')->name('profile');
    });
});

Route::middleware(['guest'])->group(function () {
    Route::controller(AuthController::class)->group(function () {

        Route::get('login', 'index')->name('login');
        Route::post('login/action', 'index')->name('login.action');

        Route::get('alterar/senha/{token}', 'changePassword')->name('password.reset');

        Route::post('/alterar/senha', 'passwordUpdate')->name('password.update');
    });

});
