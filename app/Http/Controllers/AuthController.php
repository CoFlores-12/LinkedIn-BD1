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
            'password'=>bcrypt($request->password),
        ]);
        $token = JWTAuth::fromUser($user);
        session()->put('token',$token);
        return response()->json([
            'message'=>'Successfully created user!',
            'token'=>$token,
        ],201);
    }

    public function login(Request $request){
        $credentials = $request->only('email','password');
        if(!$token = JWTAuth::attempt($credentials)){
            return response()->json([
                'message'=>'Invalid credentials!'
            ],401);
        }
        session()->put('token',$token);
        return response()->json([
            'token'=>$token,
        ],200);
    }
  
}
