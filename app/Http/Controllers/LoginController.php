<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        
        return view('auth.login');
    }

    public function authuser(Request $request){
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required',

        ]);
        auth()->attempt($request->only('email','password'));
    }
}
