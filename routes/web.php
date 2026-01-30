<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'register']);

Route::post('/register', [AuthController::class, 'store']);
Route::post('/login', [AuthController::class, 'authenticate']);

Route::get('/dashboard', [AuthController::class, 'dashboard']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/landingpage', [AuthController::class, 'landingpage']);
Route::get('/forgot', [AuthController::class, 'forgot']);
Route::post('/checkEmail', [AuthController::class, 'checkEmail']);
Route::get('/changepassword', [AuthController::class, 'newpassword']);

Route::post('/new_password' ,[AuthController::class, 'updatePassword']);

Route::get('/search', [SearchController::class, 'search']);
Route::get('/profile', [SearchController::class, 'profile']);
