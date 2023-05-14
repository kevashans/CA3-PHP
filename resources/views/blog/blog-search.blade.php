@extends('layouts.app')


@section('content')
<div class="background-image grid grid-cols-1 m-auto">
    <div class="flex text-gray-100 pt-10">
        <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block text-center">
            <h1 class="sm:text-white text-5xl uppercase font-bold text-shadow-md pb-14">
                Forum Posts
            </h1>
            <form action="{{ route('blog.search') }}" method="GET" class="mt-7">
                    {{-- <div class="flex flex-wrap justify-center mb-4">
                    <div class="relative mr-4">
                        <input
                            class="w-full px-3 py-2 text-gray-700 bg-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"
                            type="text" name="search" placeholder="Search" required />
                    </div>
                    <button
                        class="px-3 py-2 text-white colored_button rounded-md hover:colored_button focus:outline-none focus:colored_button"
                        type="submit">Search</button>
                </div> --}}
                    <div class="relative flex flex-wrap justify-center mb-4">
                        <input
                            class="w-full px-3 py-2 text-gray-700 bg-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"
                            type="text" name="search" placeholder="Search" required />
                        <button
                            class="absolute right-0 top-0 bottom-0 px-3 py-2 text-white colored_button_lite rounded-md hover:colored_button focus:outline-none focus:colored_button">
                            Search
                        </button>
                    </div>

                    @if (Auth::check())
            <div class="pt-15 w-4/5 m-auto">
              <a href="/blog/create?topicId={{ $topics_id }}" class="colored_button_lite uppercase bg-transparent text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl">
              Create post
              </a>
            </div>
            @endif
                    </form>

            
            
        </div>
    </div>
</div>

        <div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
            @if($posts->count())
                @foreach ($posts as $post)
                    <div>
                        <h2 class="text-gray-700 font-bold text-5xl pb-4">
                            {{ $post->title }}
                        </h2>

                        <span class="text-gray-500">
                            By <span class="font-bold italic text-gray-800">{{ $post->user->name }}</span>, Created on
                            {{ date('jS M Y', strtotime($post->updated_at)) }}
                        </span>

                        <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light truncate ...">
                            {{ $post->description }}
                        </p>

                        <div class="flex justify-between">
                            <a href="{{ route('blog.show', $post->slug) }}" class="colored_button uppercase bg-transparent text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl">
                                Keep Reading
                            </a>

                            @if (isset(Auth::user()->id) && Auth::user()->id == $post->user_id)
                                <div class="flex">
                                    <a href="{{ route('blog.edit', [$post->slug, 'topicId' => $topics_id]) }}" class="colored_button uppercase bg-transparent text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl">
                                        Edit
                                    </a>

                                    <form action="{{ route('blog.destroy', $post->slug) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <input type="hidden" name="topics_id" value="{{ $topics_id }}">
                                        <button class="bg-red-500 uppercase bg-transparent text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl ml-2" type="submit">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            @else
            <div class="pt-15 w-4/5 m-auto text-center">
                        <h2
                        class="bg-red-500 uppercase bg-transparent text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl">
                                No Posts Found!
                        </h2>
                </div>
            @endif
        </div>
    </div>
@endsection
