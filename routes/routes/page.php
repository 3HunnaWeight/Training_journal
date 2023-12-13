<?php

use App\Router\Route;
use App\Controllers\ControllerRouter;
use App\Middleware\PrivateRoute;


Route::page('/', ControllerRouter::class, 'index',);
Route::page('/register', ControllerRouter::class, 'register', PrivateRoute::class);
Route::page('/login', ControllerRouter::class, 'login', PrivateRoute::class);
