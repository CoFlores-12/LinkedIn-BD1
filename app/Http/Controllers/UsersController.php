<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

use Illuminate\Http\Request;

class UsersController extends Controller{
    public static function getAll(){
        $user =  DB::table('users')
        ->select('users.id', 'users.name', 'users.email', 'users.photo', 'users.banner', 'users.location', 'users.info')
        ->get();
        return $user;
    }

    public static function getUser($id){
        $user =  DB::table('users')
        ->where('users.id', $id)
        ->select('users.id', 'users.name', 'users.email', 'users.photo', 'users.banner', 'users.location', 'users.info')
        ->get();
        return $user;
    }

    public static function createUser($name, $email, $password){
        $user =  DB::table('users')
        ->insert([
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ]);
        return '{"message":"Usuario creado con exito"}';
    }

    public static function updateUser($id, $name, $email, $password){
        $user =  DB::table('users')
        ->where('users.id', $id)
        ->update([
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ]);
    }


    public static function deleteUser($id){
        $user =  DB::table('users')
        ->where('users.id', $id)
        ->delete();
    }

    public static function loginUser($email, $password){
        $user =  DB::table('users')
        ->where('users.email', $email)
        ->where('users.password', $password)
        ->select('users.id', 'users.name', 'users.email', 'users.photo', 'users.banner', 'users.location', 'users.info')
        ->get();
        return $user;
    }
}
