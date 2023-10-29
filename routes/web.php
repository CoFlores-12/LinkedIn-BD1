<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Token;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function () {
    return view('login');
});
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/home', function () {
    $value = session()->get('token');
    $id = JWTAuth::decode(new Token($value))['sub'];
    $res = DB::table('users')
            ->select('users.id','name', 'email', 'banner', 'photo', 'info', 'location')
            ->where('id', $id)->first();
        
    return view('home', ['user' => $res]);
});

Route::get('/test', function () {
    $user = DB::table('users')
            ->join('categories','users.categories_id','=','categories.id')
            ->select('users.id','users.name', 'users.email', 'users.banner', 'users.photo', 'users.info', 'users.location','categories.nombre as nombreCategoria' )
            ->where('users.id', 65)->first();
        return $user;
});

Route::get('/in/{id}', [UsersController::class, 'viewProfile']);

Route::get('/pruebaDB', function () {
    return DB::select('SELECT * FROM HELP');
});


//############ POSTS ROUTES ############
Route::post('/posts/crear', [PostController::class, 'crear']);

Route::get('/posts', [PostController::class, 'getPosts']);