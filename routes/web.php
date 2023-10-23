<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\DB;

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
Route::get('/home', function () {
    return view('home');
});

Route::get('/test', function (Request $request) {
    return  session('token');;
});
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/setCookie', function(Request $request){
    return session()->put('id',"set_cookie");
});

Route::get('/in/{id}', [UsersController::class, 'viewProfile']);

Route::get('/pruebaDB', function () {
    return DB::select('SELECT * FROM HELP');
});