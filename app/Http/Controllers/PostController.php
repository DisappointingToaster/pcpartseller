<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index(){
        
        return view('posts.index');

    }
    public function store(Request $request){
        
        $this->validate($request,[
            'body'=>'required',
            'image'=>'required|image'
        ]);
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'),$imageName);
        //$request->image->storeAs('/public', $imageName);
        $request->user()->posts()->create([
            'body'=>$request->body,
            'url'=>$imageName
        ]);

        return back();
    }
}
