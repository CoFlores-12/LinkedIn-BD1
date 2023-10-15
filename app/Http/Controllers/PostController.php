<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Token;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public static function getAll(){
        $post =  DB::table('posts')
        ->join('users', 'users.id', '=', 'posts.user_id')
        ->select('posts.*', 'users.name', 'users.photo')
        ->get();
        return $post;
    }

    public static function getPost($id){
        $post =  DB::table('posts')
        ->join('users', 'users.id', '=', 'posts.user_id')
        ->select('posts.*', 'users.name', 'users.photo')
        ->where('posts.id', $id)
        ->get();
        return $post;
    }

    public static function getPosts(Request $request){
        $value = $request->cookie('token');
        
        $idUSer = JWTAuth::decode(new Token($value))['sub'];
        $post = DB::table('posts')
        ->select('*')
        ->whereIn('user_id',(function ($query, $idUser) {
                $query->from('following')
                    ->select('following.to')
                    ->where('following.from','=',$idUser);
            })
            ->orderBy('posts.created_at','desc')
            ->get());

        return $post;
    }
}
