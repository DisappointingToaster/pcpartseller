<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class RegisterController extends Controller
{
    public function index()
    {

        return view('auth.register');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'username'=>'required|min:5',
            'email'=>'required|email',
            'password'=>'min:8|required|confirmed',

        ]);
        User::create([
            'name'=>$request->name,
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=> Hash::make($request->password),

        ]);

        return redirect()->route('dashboard');
    }
}
