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

//############ AUTH ROUTES ############


//############ USERS ROUTES ############
Route::get('/me', [UsersController::class, 'getProfile']);
//############ POSTS ROUTES ############
Route::get('/posts', [PostController::class, 'getPosts']);

Route::get('/tosql', function(){
    $idUSer = 1;
    $post =  DB::table('posts')
        ->join('users', 'users.id', '=', 'posts.user_id')
        ->select('posts.*', 'users.name', 'users.photo')
        ->toSql();
    return $post;
});

