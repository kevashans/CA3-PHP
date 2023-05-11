@extends('layouts.app')

@section('content')
    <div class="w-4/5 m-auto text-center">
        <div class="py-15 border-b border-gray-200">
            <h1 class="text-6xl">
                Forums
            </h1>
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

    <form action="{{ route('search') }}" method="GET">
        <input type="text" name="search" required />
        <button type="submit">Search</button>
        @foreach ($tags as $tag)
        <span class="m-3">
            
            <input class="rounded" type="checkbox" name="tags[]" value= {{ $tag->name }} id={{ $tag->name }}>
            <label class="ml-2" for={{ $tag->name }}>{{ $tag->name }}</label>
        </span>
        @endforeach
    </form>

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
                            <i class="fas fa-tag mr-1"></i>
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
