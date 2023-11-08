<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;

use Illuminate\Support\Facades\DB;
Route::get('/tosql', function(){
    $idUSer = 65;
    $myskills =  DB::table("posts")
    ->join('users', 'users.id', '=', 'posts.users_id')
    ->select('posts.*',  'users.name', 'users.photo')
    ->whereIn("users_id", function($query) use ($idUSer) {
        $query->from("following")
        ->select("following.to")
        ->where("following.from", "=", $idUSer);
    })
    ->orderBy("posts.datepost","desc")
    ->tosql();

    return $myskills;
});

