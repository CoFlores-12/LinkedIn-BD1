<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;

use Illuminate\Support\Facades\DB;
Route::get('/tosql', function(){
    date_default_timezone_set("America/Tegucigalpa");
    $id = 121;
    $otherId = 65;
    $chat = DB::table('chats')->where('USERS_ID', $otherId)
    ->where('USERS_ID1', $id)
    ->orwhere('USERS_ID', $id)
    ->where('USERS_ID1', $otherId)->first();
    $msg= 'js api';
    return DB::insert('INSERT INTO messages("CHATS_ID","MENSSAGE", "USERS_ID", "DATEMSG", "SEEN") values ('.$chat->id.',\''.$msg.'\','. '121' .',\''.date('Y-m-d H:i:s').'\', 0)');
});

