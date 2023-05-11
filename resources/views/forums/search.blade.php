@extends('layouts.app')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


@section('content')
<div class="background-image grid grid-cols-1 m-auto">
    <div class="flex text-gray-100 pt-10">
        <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block text-center">
            <h1 class="sm:text-white text-5xl uppercase font-bold text-shadow-md pb-14">
                Forums
            </h1>
            <form action="{{ route('search') }}" method="GET" class="mt-7">
                {{-- <div class="flex flex-wrap justify-center mb-4">
                    <div class="relative mr-4">
                        <input
                            class="w-full px-3 py-2 text-gray-700 bg-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"
                            type="text" name="search" placeholder="Search" required />
                    </div>
                    <button
                        class="px-3 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600"
                        type="submit">Search</button>
                </div> --}}
                <div class="relative flex flex-wrap justify-center mb-4">
                    <input class="w-full px-3 py-2 text-gray-700 bg-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" type="text" name="search" placeholder="Search" required />
                    <button class="absolute right-0 top-0 bottom-0 px-3 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
                
                <div class="flex flex-wrap justify-center">
                    @foreach ($tags as $tag)
                        <span class="m-1">
                            <input type="checkbox" name="tags[]" value="{{ $tag->name }}" id="{{ $tag->name }}">
                            <label class="px-3 py-1 text-gray-700 bg-gray-200 rounded-md cursor-pointer hover:bg-gray-300"
                                for="{{ $tag->name }}">{{ $tag->name }}</label>

                        </span>
                    @endforeach
                </div>
                
            </form>
        </div>
    </div>
</div>

    @if (session()->has('message'))
        <div class="w-4/5 m-auto mt-10 pl-2">
            <p class="w-2/6 mb-4 text-gray-50 bg-green-500 rounded-2xl py-4">
                {{ session()->get('message') }}
            </p>
        </div>
    @endif

    {{-- @if (Auth::check())
    <div class="pt-15 w-4/5 m-auto">
        <a 
            href="/forums/create"
            class="bg-blue-500 uppercase bg-transparent text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl">
            Create Forum
        </a>
        <a href="/tags" class="uppercase bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
            add Tags
        </a>
    </div>x
@endif --}}

    {{-- <form action="{{ route('search') }}" method="GET">
        <input type="text" name="search" required />
        <button type="submit">Search</button>
        @foreach ($tags as $tag)
        <span class="m-3">
            <input class="rounded border-gray-400 focus:ring-2 focus:ring-blue-400" type="checkbox" name="tags[]" value="{{ $tag->name }}" id="{{ $tag->name }}">
            <label class="ml-2 text-gray-700" for="{{ $tag->name }}">{{ $tag->name }}</label>
        </span>
        
        @endforeach
    </form> --}}

    @if ($posts->isNotEmpty())
        @foreach ($posts as $topic)
            <div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
                <div>
                    <img src="{{ asset('image/' . $topic->topic_image) }}" alt="">
                </div>
                <div>
                    <h2 class="text-gray-700 font-bold text-5xl pb-4">
                        {{ $topic->topic_name }}
                    </h2>
                    @foreach ($topic->tags as $tag)
                        <span
                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-sm font-medium bg-blue-100 text-gray-800">
                            <i class="fa fa-tag"></i>
                            {{ $tag->name }}
                        </span>
                    @endforeach

                    <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
                        {{ $topic->topic_description }}
                    </p>

                    <a href="{{ route('blog.index', ['topicId' => $topic->id]) }}"
                        class="uppercase bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
                        Keep Reading
                    </a>
                </div>
            </div>
        @endforeach
    @else
        <div>
            <h2>No posts found</h2>
        </div>
    @endif







    @if (isset(Auth::user()->id) && Auth::user()->id == $topic->user_id)
        {{-- <a class="uppercase bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
                add Tags
            </a> --}}
        {{-- <span class="float-right">
                    <a 
                        href="/blog/{{ $post->slug }}/edit"
                        class="text-gray-700 italic hover:text-gray-900 pb-1 border-b-2">
                        Edit
                    </a>
                </span>

                <span class="float-right">
                     <form 
                        action="/blog/{{ $post->slug }}"
                        method="POST">
                        @csrf
                        @method('delete')

                        <button
                            class="text-red-500 pr-3"
                            type="submit">
                            Delete
                        </button>

                    </form>
                </span> --}}
    @endif
    </div>
    </div>
    

@endsection
