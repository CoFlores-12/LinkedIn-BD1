<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
Route::get('/tosql', function(){
    $user = new User();
    $user->name = "Juan";
    $user->email = "<EMAIL>";
    $user->password = "<PASSWORD>";
    $user->save();
    return $user;
});

