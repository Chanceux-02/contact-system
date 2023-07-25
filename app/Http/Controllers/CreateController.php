<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CreateController extends Controller
{
    public function register(Request $req){

        $validator = Validator::make($req->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $name = $req->input('name');
        $email = $req->input('email');
        $password = $req->input('password');
        $hashedPwd = Hash::make($password);

        $users = new User;
        $users->name = $name;
        $users->email = $email;
        $users->password = $hashedPwd;
        $users->save();

        return redirect('/thankyou')->with('message','Register Successful!');
    }
}
