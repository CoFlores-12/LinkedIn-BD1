<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
  
    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function register(Request $request){
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
            'categories_id'=>0,
            'photo'=>'profile.svg',
            'banner'=>'banner1.svg'
        ]);
        $token = JWTAuth::fromUser($user);
        session()->put('token',$token);
        return response()->json([
            'message'=>'Successfully created user!',
            "code"=>200,
            'token'=>$token,
        ],200);
    }

    public function login(Request $request){
        $user = User::where(['email' => $request->email])
        ->where(['password' => $request->password])->first();
        if(!$user){
            return response()->json([
              'message' => 'Invalid credentials!',
              "code"=>401
            ],401);
        }
        $token = JWTAuth::fromUser($user);
        session()->put('token',$token);
        return response()->json([
            "code"=>200,
            'token'=>$token,
        ],200);
    }
  
}
