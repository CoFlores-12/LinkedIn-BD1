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
        /* 
        select `posts`.*, `users`.`name`, `users`.`photo` from `posts` inner join `users` on `users`.`id` = `posts`.`user_id`
        */
        $post =  DB::table('posts')
        ->join('users', 'users.id', '=', 'posts.user_id')
        ->select('posts.*', 'users.name', 'users.photo')
        ->get();
        return $post;
    }

    public static function getPost($id){
        /**
         * select `posts`.*, `users`.`name`, `users`.`photo` from `posts` inner join `users` on `users`.`id` = `posts`.`user_id` where `posts`.`id` = ?
         */
        $post =  DB::table('posts')
        ->join('users', 'users.id', '=', 'posts.user_id')
        ->select('posts.*', 'users.name', 'users.photo')
        ->where('posts.id', $id)
        ->get();
        return $post;
    }

    public static function getPosts(Request $request){
        /* 
        Forma 1
        SELECT `posts`.*, `users`.`name`, `users`.`photo` FROM `posts` INNER JOIN `users` on `users`.`id` = `posts`.`user_id` WHERE `user_id` IN (SELECT `following`.`to` FROM `following` WHERE `following`.`from` = 11) ORDER BY `posts`.`created_at` DESC;
        */

        /*
        Forma 2
        SELECT `posts`.*, `users`.`name`, `users`.`photo`, COUNT(following.to) FROM `posts` JOIN following ON `posts`.`user_id` = `following`.`to` IN (SELECT `following`.`to` FROM `following` WHERE `following`.`from` = 11) INNER JOIN `users` ON `users`.`id` = `posts`.`user_id` WHERE `user_id` IN (SELECT `following`.`to` FROM `following` WHERE `following`.`from` = 11) ORDER BY `posts`.`created_at` DESC;
        */
        $value = $request->cookie('token');
        $idUSer = JWTAuth::decode(new Token($value))['sub'];
        
        $post = DB::table("posts")
        ->join('users', 'users.id', '=', 'posts.user_id')
        ->select('posts.*',  'users.name', 'users.photo')
        ->whereIn("user_id", function($query) use ($idUSer) {
            $query->from("following")
            ->select("following.to")
            ->where("following.from", "=", $idUSer);
        })
        ->orderBy("posts.created_at","desc")
        ->get();

        return $post;
    }
}