<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;

use Illuminate\Support\Facades\DB;
Route::get('/tosql', function(){
    $myskills = DB::select('SELECT skills.name FROM my_skills INNER JOIN skills ON skills.id = my_skills.skills_id  WHERE my_skills.users_id = '. 65 );

    foreach ($myskills as $skillf) {
        return $skillf->name;
        if(!in_array($skillf->name,$skills)){
        }
    }

    return $myskills;
});

