@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="bg-white rounded-lg w-8/12 p-6">
            @auth
                <form action="{{ route('storePost') }}" method="POST" class="mb-4">
                    @csrf
                    <div class="mb-4">
                        <label for="body" class="sr-only"></label>
                        <textarea name="body" id="body" cols="30" rows="4"
                            class="bg-gray-100 border-2 w-full p-4 rounded-lg resize-none @error('body') border-red-500 @enderror"
                            placeholder="What's on your mind?">{{ old('body') }}</textarea>
                        @error('body')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <button type="submit" class="text-white bg-blue-500 w-full px-4 py-2 rounded font-medium">Post</button>
                    </div>
                </form>
            @endauth

            @if ($post->count() > 0)
                @foreach ($post as $posts)
                    <div class="mb-4">
                        <a href="" class="font-bold mr-1">{{ $posts->user->name }}</a><span
                            class="text-gray-600 text-sm">{{ $posts->created_at->diffForHumans() }}</span>
                        <p class="text-gray-700 text-base my-1">{{ $posts->body }}</p>

                        <div class="flex items-center">
                            @auth
                                @if (!$posts->likedBy(auth()->user()))
                                    <form action="{{ route('post.likes', $posts) }}" method="POST" class="mr-1">
                                        @csrf
                                        <button type="submit" class="text-blue-500"><i class="fa-solid fa-thumbs-up"></i>
                                            Like</button>
                                    </form>
                                @else
                                    <form action="{{ route('post.likes', $posts) }}" method="POST" class="ml-1">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-blue-500"><i class="fa-solid fa-thumbs-down"></i>
                                            Unlike</button>
                                    </form>
                                @endif
                            @endauth

                            <i class="text-gray-600 @auth text-sm ml-2
@else
text-md m-0 
@endauth">{{ $posts->likes->count() }}
                                {{ Str::plural('like', $posts->likes->count()) }}</i>
                        </div>
                    </div>
                @endforeach

                {{ $post->links() }}
            @else
                <p class="text-gray-700 text-base">No posts yet.</p>
            @endif
        </div>
    </div>
@endsection
