<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\jobsController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Token;

Route::get('/', function () {
    $skills = DB::select('SELECT * FROM skills fetch first 10 rows only');
    return view('welcome', compact('skills'));
});

Route::get('/login', function () {
    return view('login');
});
Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);

Route::get('/home', function () {
    $value = session()->get('token');
    $id = JWTAuth::decode(new Token($value))['sub'];
    $user = DB::table('users')
            ->select('users.id','name', 'email', 'banner', 'photo', 'info', 'categories.nombre as categoryName', 'locations.location')
            ->join('categories', 'categories.id','users.categories_id')
            ->leftjoin('locations', 'locations.id','users.locations_id')
            ->where('users.id', $id)->first();
    $jobs = DB::select('select jobs.*, users.name as username, users.photo  from jobs inner join users on users.id = jobs.users_id');
    return view('home', compact('jobs','user'));
})->name('home');

Route::post('/jobs/get', [jobsController::class, 'get'])->name('job.get');

Route::get('/posts', [PostController::class, 'getPosts']);

Route::get('/getNotifications', function () {
    $value = session()->get('token');
    $id = JWTAuth::decode(new Token($value))['sub'];
    $notis = DB::select('SELECT notifications.content, notifications.typenoti, notifications.pennding, users.photo, users.name, notifications.id FROM notifications INNER JOIN users ON users.id = notifications.users_id WHERE notifications.users_id1 = '.$id .'ORDER BY notifications.id DESC ');
    return $notis;
});

Route::get('/viewNotification/{id}', function ($id) {
    $value = session()->get('token');
    $idUser = JWTAuth::decode(new Token($value))['sub'];
    $noti = DB::table('notifications')->where('id', $id)->first();
    DB::update('UPDATE notifications SET pennding = 0 where notifications.id = '.$id);
    if($noti->typenoti == 'follow'){
        return redirect()->route('users.viewProfile', $noti->users_id);
    }
    return redirect()->route('post.ver', $noti->posts_id);
});

//############################## VIEW & EDIT Profile ##############################

Route::get('/in/{id}', [UsersController::class, 'viewProfile'])->name('users.viewProfile');

Route::get('/editMyProfile', function () {
    $value = session()->get('token');
    $id = JWTAuth::decode(new Token($value))['sub'];
    $user = DB::table('users')
            ->select('users.*', 'categories.nombre as categoryName', 'locations.location')
            ->join('categories', 'categories.id','users.categories_id')
            ->leftjoin('locations', 'locations.id','users.locations_id')
            ->where('users.id', $id)->first();
    $exp = DB::select('select * from work_experience join my_experience on my_experience.work_experience_id = work_experience.id where my_experience.users_id = '.$id);

    $edu = DB::select('select * from education inner join my_education on education.id = my_education.education_id where my_education.users_id = '.$id);

    $ski = DB::select('select * from skills join my_skills on skills.id = my_skills.skills_id where my_skills.users_id = '.$id);

    $skills = DB::select('select * from skills');
    $categories = DB::select('select * from categories');
    $insti = DB::select('select * from education');
    $works = DB::select('select * from work_experience');
    $locations = DB::select('select * from locations');
    
    return view('editProfile', compact('user', 'exp', 'edu', 'ski', 'categories', 'skills', 'insti', 'works', 'locations'));
})->name('users.editProfile');


Route::post('/update', [UsersController::class, 'update'])->name('users.update');

Route::get('/getMyNetwork', function(){
    $value = session()->get('token');
    $id = JWTAuth::decode(new Token($value))['sub'];
    $user = DB::table('users')->where('id', $id)->first();
    $users = DB::select('select 
    users.id, users.name, users.banner, users.photo, categories.nombre 
from 
    users 
inner join 
    categories on categories.id = users.categories_id 
WHERE 
    ((users.categories_id = '.$user->categories_id.' and users.id != '.$id.') 
    OR
    users.id in (
        select 
            users_id 
        from 
            my_skills 
        where 
            skills_id in 
                (select skills_id from my_skills where users_id = '.$id.')
            and
                users_id != '.$id.'
    )
    OR
     users.id in (
        select 
            users_id 
        from 
            my_education 
        where 
            education_id in 
                (select education_id from my_education where users_id = '.$id.') 
            and
                users_id != '.$id.'
    )
    OR 
    users.id in (
        select 
            users_id 
        from 
            my_experience 
        where 
            work_experience_id in 
                (select work_experience_id from my_experience where users_id = '.$id.') 
            and
                users_id != '.$id.'
    ))
    AND
    NOT users.id IN (SELECT following."TO" FROM FOLLOWING where following."FROM" = '.$id.')');
    return $users;
});


Route::get('/seguir/{id}', function($id){
    $value = session()->get('token');
    $myid = JWTAuth::decode(new Token($value))['sub'];
    if(DB::table('following')->where('from', $myid)->where('to', $id)->exists()){
        return redirect()->back();
    }
    DB::insert('INSERT INTO following("FOLLOWING"."FROM","FOLLOWING"."TO") values (?,?)', array($myid, $id));
    DB::insert('INSERT INTO notifications(CONTENT, USERS_ID,USERS_ID1,TYPENOTI,PENNDING ) VALUES (\'Ha comenzado a seguirte\','.$myid.','.$id.'.,\'follow\', 1)');
    return redirect()->route('users.viewProfile', $id);

})->name('user.seguir');

Route::get('/busqueda/{termino}', function ($busqueda) {
    $users = DB::select("SELECT users.id, users.photo, users.name, categories.nombre as categoryName FROM users INNER JOIN categories on categories.id = users.categories_id WHERE UPPER(users.email) LIKE UPPER('%".$busqueda."%') OR UPPER(users.name) LIKE UPPER('%".$busqueda."%') OR UPPER(users.info) LIKE UPPER('%".$busqueda."%')");

    $posts = DB::select('select 
    "POSTS".*, "USERS"."NAME", "USERS"."PHOTO", followers, likes
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
where 
    UPPER(posts.content) LIKE UPPER(\'%'.$busqueda.'%\') 
order by 
    "POSTS"."DATEPOST" desc');

    $works = DB::select("select jobs.*, users.name as username, users.photo from jobs inner join users on users.id = jobs.users_id WHERE UPPER(jobs.name) LIKE UPPER('%".$busqueda."%') OR UPPER(jobs.description) LIKE UPPER('%".$busqueda."%')");
    return view('busqueda', compact('busqueda', 'users', 'posts', 'works'));
});

//############################## MESSAGES ##############################


Route::get('/getChats', function(){
    $value = session()->get('token');
    $id = JWTAuth::decode(new Token($value))['sub'];
    $chats = DB::select('SELECT chats.*, users.name, users.photo, (SELECT * FROM (
        select messages.menssage from messages where messages.chats_id = chats.id ORDER BY messages.datemsg DESC
    ) WHERE ROWNUM = 1) as msg, (SELECT * FROM (
        select messages.datemsg from messages where messages.chats_id = chats.id ORDER BY messages.datemsg DESC
    ) WHERE ROWNUM = 1) as lastdate, (
        select count(id) from messages where messages.chats_id = chats.id and messages.seen = 0
    ) as countPending
    FROM chats 
    inner join users on 
        ((users.id = chats.users_id and users.id != '.$id.') or (users.id = chats.users_id1 and users.id != '.$id.'))
    
    where chats.users_id = '.$id.' OR chats.users_id1 = '.$id);

    return $chats;
});

Route::get('/messaging/compose/', function () {

    // Check for search input
    if (request('search')) {
        $busqueda = request('search') ;
        $users = DB::select("SELECT users.id, users.photo, users.name FROM users INNER JOIN categories on categories.id = users.categories_id WHERE UPPER(users.email) LIKE UPPER('%".$busqueda."%') OR UPPER(users.name) LIKE UPPER('%".$busqueda."%') OR UPPER(users.info) LIKE UPPER('%".$busqueda."%')");
    } else {
        $users = DB::table('users')->get();
    }

    return view('compose')->with('users', $users);
});

Route::post('/message/compose', function (Request $request) {
    $value = session()->get('token');
    $id = JWTAuth::decode(new Token($value))['sub'];
    if(!DB::table('chats')
        ->where('USERS_ID', $request->id)
        ->where('USERS_ID1', $id)
        ->orwhere('USERS_ID', $id)
        ->where('USERS_ID1', $request->id)
            ->exists()){
        DB::insert('INSERT INTO chats("USERS_ID","USERS_ID1") values (?,?)', array($id, $request->id));
        $chat = DB::table('chats')->where('USERS_ID', $id)->where('USERS_ID1', $request->id)->first();

        DB::insert('INSERT INTO messages("CHATS_ID","MENSSAGE", "USERS_ID", "DATEMSG", "SEEN") values ('.$chat->id.',\''.$request->msg.'\','.$id.',\''.date('Y-m-d H:i:s').'\',0)');
    }
    return redirect()->route('home');
});

Route::post('/message/send', function (Request $request) {
    
    date_default_timezone_set("America/Tegucigalpa");
    $value = session()->get('token');
    $id = JWTAuth::decode(new Token($value))['sub'];
    
    $chat = DB::table('chats')
    ->where('USERS_ID', $request->id)
    ->where('USERS_ID1', $id)
    ->orwhere('USERS_ID', $id)
    ->where('USERS_ID1', $request->id)
    ->first();

    DB::insert('INSERT INTO messages("CHATS_ID","MENSSAGE", "USERS_ID", "DATEMSG", "SEEN") values ('.$chat->id.',\''.$request->msg.'\','.$id.',\''.date('Y-m-d H:i:s').'\', 0)');

    return $chat->id;
});

Route::get('/getChat/{id}', function($id){
    $value = session()->get('token');
    $myid = JWTAuth::decode(new Token($value))['sub'];
    DB::update('update MESSAGES SET messages.seen = 1 WHERE MESSAGES.CHATS_ID = '.$id);
    $msgs = DB::select('SELECT * FROM messages WHERE MESSAGES.CHATS_ID = '.$id);
    $user = DB::select('SELECT users.name, users.photo, users.id
    FROM chats 
    inner join users on 
        ((users.id = chats.users_id and users.id != '.$myid.') or (users.id = chats.users_id1 and users.id != '.$myid.'))
    WHERE chats.id = '.$id);
    $user1 = DB::select('SELECT id, users.photo FROM users WHERE users.id = '.$myid);
    return response()->json([
        'status'=> 200,
        'user'=>$user[0],
        'user1'=>$user1[0],
        'msgs'=>$msgs
    ]);
});

//############################## POSTS ROUTES ##############################

Route::post('/posts/crear', [PostController::class, 'crear']);

Route::get('/feed/{id}', [PostController::class, 'getPost'])->name('post.ver');

Route::get('/like/{idPost}', [PostController::class,'like'])->name('post.like');

Route::get('/comments/{idPost}', [PostController::class,'comments'])->name('post.comments');

Route::post('/comments', [PostController::class,'createComment'])->name('post.comments.reate');

//############################## JOBS ROUTES ##############################

Route::get('/jobs/create', [jobsController::class, 'crear'])->name('jobs.create');
Route::post('/jobs/create', [jobsController::class, 'store'])->name('job.create');
Route::get('/job/{id}', [jobsController::class, 'view'])->name('job.view');
Route::get('/jobs/user/{id}', [jobsController::class, 'viewByUser'])->name('jobs.user.view');
Route::get('/jobs/solicitar/{id}', [jobsController::class, 'solicitar'])->name('jobs.solicitar.view');
Route::get('/jobs/solicitudes/{id}', [jobsController::class, 'solicitudes'])->name('jobs.solicitudes.view');
Route::get('/jobs/myApplications', [jobsController::class, 'mysolicitudes'])->name('jobs.mysolicitudes.view');