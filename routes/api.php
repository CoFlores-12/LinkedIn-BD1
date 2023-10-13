<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;  
use App\Http\Controllers\UsersController;

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
//############ USERS ROUTES ############

Route::post('/login', function (Request $request) {
    return usersController::class::loginUser($request->email, $request->password);
});

Route::post('/register', function (Request $request) {
    return UsersController::class::createUser($request->name, $request->email, $request->password);
});

Route::get('/user/{id}', function ($id) {
    return usersController::class::getUser($id);
});

//############ POSTS ROUTES ############

Route::get('/posts', function () {
    return PostController::class::getAll();
});

Route::get('/post/{id}', function ($id) {
    return PostController::class::getPost($id);
});
