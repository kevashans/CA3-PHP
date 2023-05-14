@extends('layouts.app')

<?php $topics_id = $_GET['topicId']; ?>

@section('content')
<div class="sm:container sm:mx-auto sm:max-w-lg sm:mt-10">
    <div class="w-full">
        <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

            <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                <h1 class="text-3xl">
                    Update Post
                </h1>
            </header>

            <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8"
                action="/blog/{{ $post->slug }}"
                method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="flex flex-wrap">
                    <label for="title" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                        {{ __('Title') }}:
                    </label>

                    <input id="title" type="text" class="form-input w-full @error('title') border-red-500 @enderror"
                        name="title" value="{{ $post->title }}" required autofocus>

                    @error('title')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="flex flex-wrap">
                    <label for="description" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                        {{ __('Description') }}:
                    </label>

                    <textarea id="description" class="form-input w-full @error('description') border-red-500 @enderror"
                        name="description" rows="5" required>{{ $post->description }}</textarea>

                    @error('description')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="flex flex-wrap">
                    <label for="image" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                        {{ __('Image') }}:
                    </label>

                    <label for="image" class="w-full bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center justify-center cursor-pointer border border-gray-300">
                        <span class="mr-2">
                            {{ __('Select a file') }}
                        </span>
                        <input 
                            id="image"
                            type="file"
                            name="image"
                            class="hidden">
                    </label>

                    @error('image')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <input type="hidden" name="topics_id" value="{{ $topics_id }}">

                <div class="flex flex-wrap">
                        <button type="submit"
                            class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 colored_button hover:colored_button sm:py-4">
                            {{ __('Update Post') }}
                        </button>
                </div>
            </form>
        </section>
    </div>
</div>
@endsection
