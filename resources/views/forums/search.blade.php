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
                        class="px-3 py-2 text-white colored_button rounded-md hover:colored_button focus:outline-none focus:colored_button"
                        type="submit">Search</button>
                </div> --}}
                    <div class="relative flex flex-wrap justify-center mb-4">
                        <input
                            class="w-full px-3 py-2 text-gray-700 bg-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"
                            type="text" name="search" placeholder="Search" required />
                        <button
                            class="absolute right-0 top-0 bottom-0 px-3 py-2 text-white colored_button_lite rounded-md hover:colored_button focus:outline-none focus:colored_button">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>

                    <details class="colored_button_lite bg-transparent shadow rounded group mb-4">
                        <summary class="list-none flex flex-wrap items-center cursor-pointer
                        focus-visible:outline-none focus-visible:ring focus-visible:ring-pink-500
                        rounded group-open:rounded-b-none group-open:z-[1] relative
                        ">
                          <h3 class="flex flex-1 p-4 font-semibold justify-center">Tags</h3>
                          <div class="flex w-10 items-center justify-center">
                            <div class="border-8 border-transparent border-l-gray-600 ml-2
                            group-open:rotate-90 transition-transform origin-left
                            "></div>
                          </div>
                        </summary>
                        <div class="flex flex-wrap justify-center">
                            @foreach ($tags as $tag)
                                <span class="m-1">
                                    <input type="checkbox" name="tags[]" value="{{ $tag->name }}" id="{{ $tag->name }}">
                                    <label
                                        class="px-3 py-1 text-gray-700 bg-gray-200 rounded-md cursor-pointer hover:bg-gray-300"
                                        for="{{ $tag->name }}"><i class="fa fa-tag"></i>{{ $tag->name }}</label>
                                </span>
                            @endforeach
                        </div>
                    </details>

                    @if (Auth::check())
                        <div class="pt-15 w-4/5 m-auto">
                        <a href="/forums/create"
                                class="colored_button_lite uppercase bg-transparent text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl">
                                Create Forum
                            </a>
                            <a href="/tags"
                                class="colored_button_lite uppercase bg-transparent text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl ml-5">
                                add Tags
                            </a>
                        </div>
                    @endif

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
                            <a href="/forums/create"
                                class="colored_button_lite uppercase bg-transparent text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl">
                                Create Forum
                            </a>
                            <a href="/tags"
                                class="colored_button_lite uppercase bg-transparent text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl ml-5">
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

                    <div class="flex justify-start gap-0 items-center">
                        <a href="{{ route('blog.index', ['topicId' => $topic->id]) }}"
                            class="uppercase colored_button text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
                            Explore
                        </a>
    
                        @if (Auth::check())
                         
                            @if (!\App\Models\Following::where('user_id', Auth::user()->id)->where('topic_id', $topic->id)->exists())
                                <form method="post" action="{{ route('following.store') }}" class="flex items-center">
                                    @csrf
                                    <input type="hidden" name="topic_id" value="{{ $topic->id }}" />
                                    <button type="submit"
                                        class="uppercase colored_button text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl mt-4 ml-4">Follow</button>
                                </form>
                            @else
                            <form method="post" action="{{ route('following.delete') }}" class="flex items-center">
                                @csrf
                                <input type="hidden" name="topic_id" value="{{ $topic->id }}" />
                                <button
                                    class="uppercase bg-gray-400 ml-5 text-black-100 text-lg font-extrabold py-4 px-8 rounded-3xl mt-4">Unfollow</button>
                            </form>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    @else

                <div class="pt-15 w-4/5 m-auto text-center">
                        <h2
                        class="bg-red-500 uppercase bg-transparent text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl">
                                No Forums Found!
                        </h2>
                </div>
    @endif

    </div>
    </div>
    

@endsection
