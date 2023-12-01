<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;

use Illuminate\Support\Facades\DB;
Route::get('/tosql', function(){
    return DB::insert('insert into LOCATIONS (location) values (\'?\')', array("Tegucigalpa"));
});

