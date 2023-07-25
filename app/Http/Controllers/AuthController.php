<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $req){
       $validated = Validator::make($req->all(),[
        "email" => ['required', 'email'],
        "password" => ['required']
       ]);

       if($validated->fails()){
            return response()->json(["Error", "There was an error in your inputs"], 200);
        }

        $credentials = $req->only('email', 'password');
        $auth = Auth::attempt($credentials);

        if(!$auth){
            return response()->json(["Error", "Log in failed"], 400);
        }
        
        $req->session()->regenerate();
        
        return redirect('/')->with('message', 'login Successful!');
    }

    public function logout(Request $req){
        auth()->logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();

        return redirect('/login')->with('message', 'logged out!');
    }
}
