@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg flex">
            <form action="{{route('dashboard.edit',$post)}}" method="POST" class="mb-4" enctype="multipart/form-data">
                @csrf
            <div class="flex">
            <img src="{{asset('images/'.$post->url)}}" alt="funny image" height="360px" width="360px">
            <label for="body" class="sr-only">Body</label>
                    <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100 border-2 justify-self-stretch 
                    p-4 rounded-lg @error('body') border-red-500 @enderror">{{$post->body}}</textarea>
                    @error('body')
                        <div class="text-red-500 mt-2 text-sm">
                            {{$message}}
                        </div>
                    @enderror
            </div>
            <div class="flex">
                <label for="image" class="px-3">{{ __('lang.imageSelect') }}</label>
                <input id="image" type="file" name="image"> 
            </div>
                @error('image')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
                    @enderror
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">{{ __('lang.postPost') }}</button>
            </form>
        </div>
    </div>

@endsection