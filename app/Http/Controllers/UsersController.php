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
        $user = DB::table('users')
            ->join('categories','users.categories_id','=','categories.id')
            ->select('users.id','users.name', 'users.email', 'users.banner', 'users.photo', 'users.info', 'users.location','categories.nombre as nombreCategoria' )
            ->where('users.id', $request->id)->first();
        $publicaciones = DB::select('SELECT * FROM posts WHERE users_id = ' . $request->id .'');
        $followers = DB::select('SELECT count(id) as followers FROM following WHERE "TO" = '.$request->id);
        $value = session()->get('token');
        $id = JWTAuth::decode(new Token($value))['sub'];
        return view('profile', ['user' => $user, 'myID' => $id, 'publicaciones' => $publicaciones, 'followers'=> $followers]);
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
