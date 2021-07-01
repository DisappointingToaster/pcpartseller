<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class RegisterController extends Controller
{
    public function __construct()
    {  
       $this->middleware(['guest']); 
    }
    public function index()
    {

        return view('auth.register');
    }

    public function store(Request $request)
    {
        
        $this->validate($request,[
            'name'=>'required',
            'username'=>'required|min:5|unique:users,username',
            'email'=>'required|email|unique:users,email',
            'password'=>'min:8|required|confirmed',

        ]);
        User::create([
            'name'=>$request->name,
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=> Hash::make($request->password),

        ]);
        auth()->attempt($request->only('email','password'));
        return redirect()->route('home');
    }
}
