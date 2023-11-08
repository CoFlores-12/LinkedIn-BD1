<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;

use Illuminate\Support\Facades\DB;
Route::get('/tosql', function(){
    $idUSer = 22;
    $noti = DB::table('notifications')->insertGetId([
        'content'=>'Ha hecho una nueva publicacion',
        'posts_id'=>$idUSer
    ]);
    return $noti;
});

