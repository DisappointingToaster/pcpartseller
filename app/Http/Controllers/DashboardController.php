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
    public function edit(Post $post){
        
        return view('posts.edit',[
            'post'=>$post,
        ]);
    }
    public function update(Request $request, Post $post){
        $this->validate($request,[
            'body'=>'required',
            'image'=>'nullable|image'
        ]); 
        if($request->image==!null){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'),$imageName);
            $post->url=$imageName;
        }
        $post->body=$request->body;
        $post->save();
        return redirect()->route('home');
    }

}
