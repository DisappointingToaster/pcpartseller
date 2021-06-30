<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function deauth(){
        
        auth()->logout();
        return redirect()->route('home');
    }
}
