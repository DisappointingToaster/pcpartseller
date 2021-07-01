<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\User;
class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index(User $user)
    {
        
        $posts=$user->posts()->paginate(10);

        return view('dashboard',[
            'user'=>$user,
            'posts'=>$posts
        ]);

    }
    public function destroy(Post $post){
        $post->delete();
        return back();
    }

}
