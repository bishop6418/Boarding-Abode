<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        $login = $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
          ]);

        $user = User::where('email',$request->email)->first();

        if (!Auth::attempt( $login ))
        {
           return response()->json(['message' => 'Email/Password Incorrect!'], 500);
        }

        $token = $user->createToken('authToken')->accessToken;

        return response()->json(['user' => $user, 'access_token' => $token]);
    }

    public function logout()
    {
        if(Auth::logout()){
            return response(['message' => 'Successfully logged out']);
        }
    }
}
