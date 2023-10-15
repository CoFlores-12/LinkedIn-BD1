<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;  
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//############ AUTH ROUTES ############
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

//############ USERS ROUTES ############
Route::get('/me', [UsersController::class, 'getProfile']);
//############ POSTS ROUTES ############
Route::get('/posts', [PostController::class, 'getPosts']);

