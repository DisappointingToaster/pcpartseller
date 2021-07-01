@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-10/12 bg-white p-6 rounded-lg">
            <form action="{{route('posts')}}" method="post" class="mb-4" enctype="multipart/form-data">
            @csrf
                <div class="mb-4">
                    <label for="body" class="sr-only">Body</label>
                    <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100 border-2 w-full 
                    p-4 rounded-lg @error('body') border-red-500 @enderror" placeholder="Your text here!"></textarea>

                    @error('body')
                        <div class="text-red-500 mt-2 text-sm">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="flex">
                    <label for="image" class="px-3">Choose Image:</label>
                    <input id="image" type="file" name="image"> 
                </div>
                @error('image')
                <div class="text-red-500 mt-2 text-sm">
                    {{$message}}
                </div>
                @enderror
            
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">Post</button>
            </form>


            @if($posts->count())
                @foreach ($posts as $post)
                    <div class="mb-4">
                        <a href="" class="font-bold">{{$post->user->username}}</a>   <span class="text-gray-600 text-sm">{{$post->created_at->diffForHumans()}}</span>
                        <p class="mb-2">{!!nl2br(e($post->body))!!} </p>
                    </div>
                    <img src="{{asset('images/'.$post->url)}}" alt="funny image">
                @endforeach
                {{$posts->links()}}
            @else
                <p>There are no posts</p>
            @endif
        </div>
    </div>

@endsection