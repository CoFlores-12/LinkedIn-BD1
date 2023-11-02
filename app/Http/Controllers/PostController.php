<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Token;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        ->join('users', 'users.id', '=', 'posts.users_id')
        ->select('posts.*', 'users.name', 'users.photo')
        ->where('posts.id', $id)
        ->first();
        $comments = DB::select('SELECT * FROM comments WHERE comments.posts_id = '.$id);
        $likes = DB::select('SELECT * FROM likes WHERE likes.posts_id = '.$id);
        $followers = DB::select('SELECT count(id) as followers FROM following WHERE "TO" = '.$post->users_id);
        return view('post', compact('post', 'comments', 'likes', 'followers'));
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
        $value = session()->get('token');
        $idUSer = JWTAuth::decode(new Token($value))['sub'];
        $post = DB::table("posts")
        ->join('users', 'users.id', '=', 'posts.users_id')
        ->select('posts.*',  'users.name', 'users.photo')
        ->whereIn("users_id", function($query) use ($idUSer) {
            $query->from("following")
            ->select("following.to")
            ->where("following.from", "=", $idUSer);
        })
        ->orderBy("posts.datepost","desc")
        ->get();

        return $post;
    }

    public static function crear(Request $request){
        $destinationPath = 'storage';
        $value = session()->get('token');
        $idUSer = JWTAuth::decode(new Token($value))['sub'];

        $allowedfileExtension=['mp4','jpg','jpeg','png','pdf'];
        
        $file = $request->file('media');

        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();

        $check = in_array($extension,$allowedfileExtension);

        if(!$check){
            return response()->json(['error'=>'Formato de archivo no permitido'],400);
        }
        $file->move($destinationPath,$file->getClientOriginalName());
        $type = 'txt';
        switch ($extension){
            case'mp4':
                $type = 'video/mp4';
                break;
            case 'jpg':
                $type = 'image/jpeg';
                break;
            case 'jpeg':
                $type = 'image/jpeg';
                break;
            case 'png':
                $type = 'image/png';
                break;
            case 'pdf':
                $type = 'application/pdf';
                break;
        }
        $post = new Post();
        $post->users_id = $idUSer;
        $post->content = $request->content;
        $post->media = $filename;
        $post->type = $type;
        $post->datepost = date('Y-m-d H:i:s');
        $post->save();
        return $post;
    }
}
