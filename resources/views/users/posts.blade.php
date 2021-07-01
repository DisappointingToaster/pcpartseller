@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-gray-400 p-6 rounded-lg">
            {{$user->name}}
            @if($posts->count())
            @foreach ($posts as $post)
                <div class="mb-4">
                    <a href="{{route('users.posts',$post->user)}}" class="font-bold">{{$post->user->username}}</a>   <span class="text-gray-600 text-sm">{{$post->created_at->diffForHumans()}}</span>
                    <div class="flex mx-5">
                        <img src="{{asset('images/'.$post->url)}}" alt="funny image" height="360px" width="360px">
                        <p class="mb-2 px-6">{!!nl2br(e($post->body))!!} </p>
                    </div>
                </div>
                @auth
                        @if (auth()->user()->role==='Admin')
                            <form action="{{route('dashboard.destroy',$post)}}" method="post">
                              @csrf
                                @method('DELETE')
                                <button type="submit" class="text-blue-500 ">{{ __('lang.delete') }}</button>
                         </form>   
                        @endif   
                    @endauth
            @endforeach
            {{$posts->links()}}
        @else
            <p>{{ __('lang.arePosts') }}</p>
        @endif
        </div>
    </div>

@endsection