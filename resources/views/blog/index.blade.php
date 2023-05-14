<?php
$topics_id = $_GET['topicId'];
?>

@extends('layouts.app')

@section('content')
<div class="background-image grid grid-cols-1 m-auto">
    <div class="flex text-gray-100 pt-10">
        <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block text-center">
            <h1 class="sm:text-white text-5xl uppercase font-bold text-shadow-md pb-14">
                Forum Posts
            </h1>

            @if (Auth::check())
            <div class="pt-15 w-4/5 m-auto">
              <a href="/blog/create?topicId={{ $topics_id }}" class="colored_button_lite uppercase bg-transparent text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl">
              Create post
              </a>
            </div>
            @endif
            
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


@foreach ($posts as $post)
<div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
    <div>
        <img src="{{ asset('images/' . $post->image_path) }}" alt="" class="rounded-full">
    </div>
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
    <a href="/blog/{{ $post->slug }}" class="colored_button uppercase bg-transparent text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl">
        Keep Reading
    </a>

    @if (isset(Auth::user()->id) && Auth::user()->id == $post->user_id)
    <div class="flex">
        <a href="/blog/{{ $post->slug }}/edit?topicId={{ $topics_id }}" class="colored_button uppercase bg-transparent text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl">
            Edit
        </a>

        <form action="/blog/{{ $post->slug }}" method="POST">
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
</div>
@endforeach

@endsection
