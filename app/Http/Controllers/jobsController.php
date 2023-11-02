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
        ->select('jobs.*', 'users.name as username', 'users.photo')
        ->join('users', 'users.id', 'jobs.users_id')
        ->first();
        return view('viewJob', compact('job'));
    }

    public function get(){
        $jobs = DB::select('select jobs.*, users.name as username, users.photo  from jobs inner join users on users.id = jobs.users_id');
        return $jobs;
    }
}
