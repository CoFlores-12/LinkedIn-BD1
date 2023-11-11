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
        select posts.*, users.name, users.photo from posts inner join users on users.id = posts.user_id
        */
        $post =  DB::table('posts')
        ->join('users', 'users.id', '=', 'posts.user_id')
        ->select('posts.*', 'users.name', 'users.photo')
        ->get();
        return $post;
    }

    public static function getPost($id){
        /**
         * select posts.*, users.name, users.photo from posts inner join users on users.id = posts.user_id where posts.id = ?
         */
        $post =  DB::table('posts')
        ->join('users', 'users.id', '=', 'posts.users_id')
        ->select('posts.*', 'users.name', 'users.photo')
        ->where('posts.id', $id)
        ->first();
        $value = session()->get('token');
        $idUSer = JWTAuth::decode(new Token($value))['sub'];
        $comments = DB::select('SELECT comments.*, users.photo, users.name, users.id,categories.nombre FROM comments inner join users on users.id = comments.users_id inner join categories on categories.id = users.categories_id WHERE posts_id ='.$id);
        $likes = DB::select('SELECT * FROM likes WHERE likes.posts_id = '.$id);
        $followers = DB::select('SELECT count(id) as followers FROM following WHERE "TO" = '.$post->users_id);
        $liked = DB::select('SELECT count(id) as liked, posts_id as postidLiked from likes where likes.USERS_ID = '.$idUSer.' AND posts_id = '.$post->id .'group by likes.posts_id');
        return view('post', compact('post', 'comments', 'likes', 'followers', 'liked'));
    }

    public static function getPosts(Request $request){
        /* 
        Forma 1
        SELECT posts.*, users.name, users.photo FROM posts INNER JOIN users on users.id = posts.user_id WHERE user_id IN (SELECT following.to FROM following WHERE following.from = 11) ORDER BY posts.created_at DESC;
        */

        /*
        Forma 2
        select "POSTS".*, "USERS"."NAME", "USERS"."PHOTO" from "POSTS" inner join "USERS" on "USERS"."ID" = "POSTS"."USERS_ID" where "USERS_ID" in (select "FOLLOWING"."TO" from "FOLLOWING" where "FOLLOWING"."FROM" = ?) order by "POSTS"."DATEPOST" desc
        */
        $value = session()->get('token');
        $idUSer = JWTAuth::decode(new Token($value))['sub'];
        $post = DB::select('select 
        "POSTS".*, "USERS"."NAME", "USERS"."PHOTO", followers, likes, liked
    from 
        "POSTS" 
    inner join 
        "USERS" on "USERS"."ID" = "POSTS"."USERS_ID" 
    left join (
        SELECT count("FOLLOWING"."TO") as followers, "FOLLOWING"."TO"  as idUser from following group by "FOLLOWING"."TO"
    ) on users.id = idUser
    left join (
        SELECT count(id) as likes, posts_id from likes group by likes.posts_id
    )on posts.id = posts_id
    left join (
        SELECT count(id) as liked, posts_id as postidLiked from likes where likes.USERS_ID = '.$idUSer.' group by likes.posts_id
    )on posts.id = postidLiked
    where 
        "USERS_ID" in (select "FOLLOWING"."TO" from "FOLLOWING" where "FOLLOWING"."FROM" = '.$idUSer.') 
    order by 
        "POSTS"."DATEPOST" desc');

        return $post;
    }

    public static function crear(Request $request){
        date_default_timezone_set("America/Tegucigalpa");
        $destinationPath = 'storage';
        $value = session()->get('token');
        $idUSer = JWTAuth::decode(new Token($value))['sub'];

        $type = 'txt';
        $filename = "txt";
        if($request->hasFile('media')){
            $allowedfileExtension=['mp4','jpg','jpeg','png','pdf'];
            
            $file = $request->file('media');
    
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
    
            $check = in_array($extension,$allowedfileExtension);
    
            if(!$check){
                return response()->json(['error'=>'Formato de archivo no permitido'],400);
            }
            $file->move($destinationPath,$file->getClientOriginalName());
            
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
        }
        
        $post = new Post();
        $post->users_id = $idUSer;
        $post->content = $request->content;
        $post->media = $filename;
        $post->type = $type;
        $post->datepost = date('Y-m-d H:i:s');
        $post->save();

        $idPost = $post->id;
        //noti logic
        
        $userToNoti = DB::select('SELECT users.id FROM users INNER JOIN following ON "FOLLOWING"."FROM" = users.id WHERE "FOLLOWING"."TO"='.$idUSer);
        foreach ($userToNoti as $user) {
            DB::insert('INSERT INTO notifications(CONTENT, posts_id, USERS_ID,USERS_ID1,TYPENOTI,PENNDING ) VALUES (\'publico algo\','.$idPost.','.$idUSer.','.$user->id.'.,\'post\', 1)');
        }
        return response()->json([
            'status'=> 200,
            'post'=> $post,
        ]);
    }

    public function like($idPost){
        $value = session()->get('token');
        $idUSer = JWTAuth::decode(new Token($value))['sub'];
        $userToNoti = DB::select('select users_id from posts where posts.id ='.$idPost)[0]->users_id;

        if(DB::table('likes')->where('USERS_ID', $idUSer)->where('POSTS_ID', $idPost)->exists()){
            DB::delete('delete likes where POSTS_ID = ? and USERS_ID = ?', array($idPost, $idUSer));
            DB::delete('delete notifications where posts_id = ? and users_id = ? and USERS_ID1 = ? and CONTENT = ?', array($idPost, $idUSer, $userToNoti, 'le gusto tu publicacion'));
        }else{
            DB::insert('INSERT INTO likes(USERS_ID, POSTS_ID) VALUES ('.$idUSer.','.$idPost.')');
            DB::insert('INSERT INTO notifications(CONTENT, posts_id, USERS_ID,USERS_ID1,TYPENOTI,PENNDING ) VALUES (\'le gusto tu publicacion\','.$idPost.','.$idUSer.','.$userToNoti.'.,\'post\', 1)');
        }

        return response()->json([
            'status'=> 200,
            'post'=> $idPost,
        ]);
    }

    public function comments($idPost){
        $comments = DB::select('SELECT comments.*, users.photo, users.name, users.id,categories.nombre FROM comments inner join users on users.id = comments.users_id inner join categories on categories.id = users.categories_id WHERE posts_id ='. $idPost);
        return $comments;
    }

    public function createComment(Request $request){
        $value = session()->get('token');
        $idUSer = JWTAuth::decode(new Token($value))['sub'];
        //DB::insert('INSERT INTO comments("comment", USERS_ID, POSTS_ID) VALUES (\''.$request->comment.'\', '.$idUSer.','.$request->id.')');
        $user = DB::select('SELECT users.photo, users.name, users.id FROM users WHERE id='.$idUSer);
        $userToNoti = DB::select('select users_id from posts where posts.id ='.$request->id)[0]->users_id;
        //DB::insert('INSERT INTO notifications(CONTENT, posts_id, USERS_ID,USERS_ID1,TYPENOTI,PENNDING ) VALUES (\'comento tu publicacion\','.$request->id.','.$idUSer.','.$userToNoti.'.,\'post\', 1)');
        return response()->json([
            'status'=> 200,
            'user'=>$user[0]
        ]);
    }
}
