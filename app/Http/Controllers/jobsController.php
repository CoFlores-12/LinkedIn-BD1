<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Token;

class jobsController extends Controller
{
    public function crear(Request $request){
        $categories = DB::select('SELECT * FROM categories');
        return view('newJob',compact('categories'));
    }
    public function store(Request $request){
        $value = session()->get('token');
        $idUSer = JWTAuth::decode(new Token($value))['sub'];
        $request->validate([
            'name' =>'required',
            'description' =>'required',
            'category' =>'required',
            'location' =>'required',
            'salary' =>'required',
        ]);
        if (!DB::table('categories')->where('NOMBRE', $request->category)->exists()){
            $category = DB::table('categories')->insert([
                'NOMBRE' => $request->category
            ]);
        }
        $category = DB::table('categories')->where('NOMBRE', $request->category)->first();
        $job = DB::table('jobs')->insert([
            'USERS_ID' => $idUSer,
            'name' => $request->name,
            'description' => $request->description,
            'category' => $category->id,
            'location' => $request->location,
            'salary' => $request->salary
        ]);
        return redirect()->route('home')->with('success','created!');
    }

    public function view($id){
        $job = DB::table('jobs')->where('jobs.id', $id)
        ->select('jobs.*', 'categories.nombre as categorynamejob')
        ->join('users', 'users.id', 'jobs.users_id')
        ->join('categories', 'categories.id', 'jobs.category')
        ->first();
        $user = DB::select('select photo, name, users.id, followers, categories.nombre, info
        from users
        INNER JOIN categories on categories.id = users.categories_id
        left join (
            SELECT count("FOLLOWING"."TO") as followers, "FOLLOWING"."TO"  as idUser from following group by "FOLLOWING"."TO"
        ) on users.id = idUser
        where users.id='.$job->users_id);
        $user = $user[0];
        $applications = DB::select('SELECT
        count(jobs_id) AS "APPLICATIONS"
      FROM
        "APPLICATIONS"
      WHERE
        "JOBS_ID" = '.$id);
        $applications=$applications[0];
        return view('viewJob', compact('job', 'user', 'applications'));
    }

    public function viewByUser($id){
        $jobs = DB::select('select jobs.*, users.name as username, users.photo  from jobs inner join users on users.id = jobs.users_id');
        return view('viewJobUser', compact('jobs'));
    }

    public function get(){
        $jobs = DB::select('select jobs.*, users.name as username, users.photo  from jobs inner join users on users.id = jobs.users_id');
        return $jobs;
    }

    public function solicitar($idJob){
        $value = session()->get('token');
        $idUSer = JWTAuth::decode(new Token($value))['sub'];

        //TOTO: verify no exist in database this user in this job
        
        DB::insert('INSERT INTO applications(jobs_id, users_id) VALUES (?,?)',array($idJob, $idUSer));
        return redirect()->route('home');
    }
}
