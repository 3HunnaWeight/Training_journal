<?php

use App\Controllers\DaysController;
use App\Controllers\UserController;
use App\Middleware\PostRequestOnly;
use App\Router\Route;

Route::page('/registerAction', UserController::class, 'register', PostRequestOnly::class);
Route::page('/loginAction', UserController::class, 'login', PostRequestOnly::class);
Route::page('/addTrainAction', DaysController::class, 'addTrainingDay', PostRequestOnly::class);
Route::page('/addTrainExcerciseAction', DaysController::class, 'addTrainingExcercise', PostRequestOnly::class);
Route::page('/logoutAction', UserController::class, 'logout', PostRequestOnly::class);
Route::page('/redactExerciseAction', DaysController::class, 'redactExercise', PostRequestOnly::class);
Route::page('/searchTrainingDayAction', DaysController::class, 'searchTrainingDay', PostRequestOnly::class);
Route::page('/deleteTrainingDayAction', DaysController::class, 'deleteTrainingDay', PostRequestOnly::class);
