<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/login', function () {
    return 'Hello World';
});
Route::get('/user/{id}', function ($id) {
    return 'Hello user '.$id;
});
Route::post('test', function(Request $request) {
    return $request;
});
Route::apiResource('v1/posts', App\Http\Controllers\Api\V1\PostController::class)->middleware('api');