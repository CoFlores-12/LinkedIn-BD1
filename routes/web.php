<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\jobsController;

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
    $skills = DB::select('SELECT * FROM skills fetch first 10 rows only');
    return view('welcome', compact('skills'));
});
Route::get('/login', function () {
    return view('login');
});
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/busqueda/{termino}', function ($busqueda) {
    return view('busqueda', compact('busqueda'));
});


Route::get('/home', function () {
    $value = session()->get('token');
    $id = JWTAuth::decode(new Token($value))['sub'];
    $user = DB::table('users')
            ->select('users.id','name', 'email', 'banner', 'photo', 'info', 'location')
            ->where('id', $id)->first();
    $jobs = DB::select('select jobs.*, users.name as username, users.photo  from jobs inner join users on users.id = jobs.users_id');
    return view('home', compact('jobs','user'));
})->name('home');

//############ USERS ROUTES ############
Route::get('/in/{id}', [UsersController::class, 'viewProfile'])->name('users.viewProfile');

//############ POSTS ROUTES ############
Route::post('/posts/crear', [PostController::class, 'crear']);

Route::get('/posts', [PostController::class, 'getPosts']);

Route::get('/feed/{id}', [PostController::class, 'getPost'])->name('post.ver');


//############ JOBS ROUTES ############
Route::get('/jobs/create', [jobsController::class, 'crear'])->name('jobs.create');
Route::post('/jobs/create', [jobsController::class, 'store'])->name('job.create');
Route::post('/jobs/get', [jobsController::class, 'get'])->name('job.get');

Route::get('/job/{id}', [jobsController::class, 'view'])->name('job.view');