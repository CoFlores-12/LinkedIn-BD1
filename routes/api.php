<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;

use Illuminate\Support\Facades\DB;
Route::get('/tosql', function(){
    date_default_timezone_set("America/Tegucigalpa");
    return date('Y-m-d H:i:s');
});

