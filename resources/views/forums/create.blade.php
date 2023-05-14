

@extends('layouts.app')

@section('content')
<div class="sm:container sm:mx-auto sm:max-w-lg sm:mt-10">
    <div class="w-full">
        <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

            <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                <h1 class="text-3xl">
                    Create Forum
                </h1>
            </header>

            <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8"
                action="/forums"
                method="POST"
                enctype="multipart/form-data">
                @csrf

                <div class="flex flex-wrap">
                    <label for="topic_name" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                        {{ __('Title') }}:
                    </label>

                    <input id="topic_name" type="text" class="form-input w-full @error('topic_name') border-red-500 @enderror"
                        name="topic_name" value="{{ old('topic_name') }}" required autofocus>

                    @error('topic_name')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="flex flex-wrap">
                    <label for="topic_description" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                        {{ __('Description') }}:
                    </label>

                    <textarea id="topic_description" class="form-input w-full @error('topic_description') border-red-500 @enderror"
                        name="topic_description" rows="5" required>{{ old('topic_description') }}</textarea>

                    @error('topic_description')
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
                    <svg class="w-4 h-4 fill-current mr-2" viewBox="0 0 20 20">
                    <path d="M17.16 5.63l-4.42-4.42A2 2 0 0 0 12.17 1H7.83a2 2 0 0 0-1.57.75L2.84 5.63A2 2 0 0 0 2 7.09v8.82a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.09a2 2 0 0 0-.84-1.46zM10 14a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm3-7h-2V5h-1v2H7v1h2v2h1v-2h2z"/>
                    </svg>
                    <span class="text-base leading-normal">{{ __('Select a file') }}</span>
                    <input id="image" type="file" name="image" class="hidden">
                    </label>

                    @error('image')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="flex flex-wrap">
                    <label for="tags" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                        {{ __('Tags') }}:
                    </label>

                    @foreach ($tags as $tag)
                        <span class="m-3">
                            <input id="{{ $tag->name }}" class="rounded" type="checkbox" name="tags[]" value="{{ $tag->name }}">
                            <label class="ml-2" for="{{ $tag->name }}">{{ $tag->name }}</label>
                        </span>
                    @endforeach    
                </div>

                <div class="flex flex-wrap">
                        <button type="submit"
                            class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 colored_button hover:colored_button sm:py-4">
                            {{ __('Create Forum') }}
                        </button>
                </div>               
            </form>
        </section>
    </div>
</div>

@endsection



