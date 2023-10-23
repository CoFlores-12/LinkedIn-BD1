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

Route::get('/tosql', function(){
    $idUSer = 1;
    $post =  DB::table('posts')
        ->join('users', 'users.id', '=', 'posts.user_id')
        ->select('posts.*', 'users.name', 'users.photo')
        ->toSql();
    return $post;
});

Route::get('/getPosts', function(){
    $idUSer = 1;
    $post =  DB::select('SELECT * FROM posts');
    return $post;
});

Route::get('/initDB', function(){
    return DB::insert('INSERT INTO "posts" ("id", "user_id", "content", "type", "media", "likes", "date", "created_at", "updated_at") VALUES
    (?,?,?,?,?,?,?,?,?)', [1,1,"El Programa de Educación Continúa ", "img", "https://media.licdn.com/dms/image/D4E22AQEOJ48IHnPiNg/feedshare-shrink_800/0/1696370114963?e=1700092800&v=beta&t=M-nAnIphL-ATlnOO2TuWl5SCuCyazd-oPKR7VQ4S7Jw", 0,  "2023/10/12", "2023-10-12 17:55:00", "2023-10-12 17:55:00"]);
});

