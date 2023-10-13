<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Token;

class UsersController extends Controller{
    public function viewProfile(Request $request){
        $res = DB::table('users')
            ->select('name', 'email', 'banner', 'photo', 'info', 'location')
            ->where('id', $request->id)->first();
        return view('profile', ['user' => $res]);
    }

    public function getProfile(Request $request){
        $value = $request->cookie('token');
        $id = JWTAuth::decode(new Token($value));
        $res = DB::table('users')
            ->select('id','name', 'email', 'banner', 'photo', 'info', 'location')
            ->where('id', $id['sub'])->first();
        return response()->json($res);
    }
}
