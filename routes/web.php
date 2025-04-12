<?php

use App\Http\Controllers\ClassifieldController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/comingSoon', [HomeController::class, 'comingSoon']);

Route::resource('classifields', ClassifieldController::class);
Route::resource('users', UserController::class)->only(['index', 'create', 'store']);
