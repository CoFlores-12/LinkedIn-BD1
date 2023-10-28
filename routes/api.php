<?php

use Illuminate\Support\Facades\Route;

Route::get('/tosql', function(){
    $idUSer = 1;
    $post =  DB::table('posts')
        ->join('users', 'users.id', '=', 'posts.user_id')
        ->select('posts.*', 'users.name', 'users.photo')
        ->toSql();
    return $post;
});

