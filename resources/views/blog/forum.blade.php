@extends('layouts.app')

@section('content')
<div class="w-4/5 m-auto text-left">
    <div class="py-15">
        <h1 class="text-6xl">
            Forum
        </h1>
    </div>
</div>

<div class="w-4/5 m-auto pt-20">
    <div class="mb-4">
        <a href="/blog/create" class="uppercase mt-15 colored_button text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">Create Post</a>
    </div>

    @foreach($posts as $post)
        <div class="bg-gray-200 rounded-lg shadow-lg p-5 my-5">
            <h2 class="text-2xl font-bold mb-2">{{ $post->title }}</h2>
            <p class="text-gray-700">{{ $post->description }}</p>
            <div class="mt-4">
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-96">
            </div>
        </div>
    @endforeach
</div>

@endsection
