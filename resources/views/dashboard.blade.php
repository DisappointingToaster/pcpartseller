@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-10/12 bg-white p-6 rounded-lg">
            {{$user->name}}
            @if($posts->count())
                @foreach ($posts as $post)
                    <div class="mb-4">
                        <a href="{{route('users.posts',$post->user)}}" class="font-bold">{{$post->user->username}}</a>   <span class="text-gray-600 text-sm">{{$post->created_at->diffForHumans()}}</span>
                        <div class="flex mx-5">
                            <img src="{{asset('images/'.$post->url)}}" alt="funny image" height="480px" width="480px">
                            <p class="mb-2 px-6">{!!nl2br(e($post->body))!!} </p>
                            
                            
                            <form action="{{route('dashboard.destroy',$post)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-blue-500 ">Delete</button>
                            </form>
                            <form action="{{route('dashboard.edit',$post)}}" method="get">
                                @csrf
                                <button type="submit" class="text-blue-500 ">Edit</button>
                            </form>
                        </div>
                    </div>
                    
                @endforeach
                {{$posts->links()}}
            @else
                <p>There are no posts</p>
            @endif
        </div>
    </div>

@endsection