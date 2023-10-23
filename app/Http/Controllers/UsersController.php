<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Session;
use Tymon\JWTAuth\Token;

class UsersController extends Controller{
    public function viewProfile(Request $request){
        if (!DB::table('users')->where('id', $request->id)->exists()){
            return response()->json([
              'status' => 404,
              'message' => 'No se encontraron resultados'
            ]);
        }
        $res = DB::table('users')
            ->select('id','name', 'email', 'banner', 'photo', 'info', 'location')
            ->where('id', $request->id)->first();
        
        $value = session()->get('token');
        $id = JWTAuth::decode(new Token($value))['sub'];
        return view('profile', ['user' => $res, 'myID' => $id]);
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
