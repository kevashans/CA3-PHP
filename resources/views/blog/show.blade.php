@extends('layouts.app')

@section('content')
@if(isset($post))

<div class="w-4/5 mx-auto text-center">
    <div class="py-8">
        <h1 class="text-4xl lg:text-5xl font-bold leading-tight">
            {{ $post->title }}
        </h1>
    </div>
    <div class="w-full lg:w-3/4 mx-auto">
        <img src="{{ asset('images/' . $post->image_path) }}" alt="" class="rounded-full w-full lg:w-3/4 mx-auto">
    </div>
</div>

<div class="w-4/5 mx-auto mt-8">
    <span class="text-gray-500 text-sm">
        By <span class="font-bold italic text-gray-800">{{ $post->user->name }}</span>, Created on {{ date('jS M Y', strtotime($post->updated_at)) }}
    </span>

    <p class="text-lg lg:text-xl text-gray-700 pt-4 leading-8 font-light">
        {{ $post->description }}
    </p>
</div>



{{-- <h4 class="text-lg font-bold ml-10 mb-4">Display Comments</h4>

@include('blog.commentsDisplay', ['comments' => $post->comments, 'post_id' => $post->id])

<hr class="my-4">

<form method="post" action="{{ route('comment.store') }}" class="my-4">
    @csrf
    <div class="mb-4 ml-10">
        <label for="body" class="block text-gray-700 font-bold mb-2">Add comment</label>
        <textarea class="form-textarea border rounded-lg px-3 py-2 w-full" name="body" rows="5"></textarea>
        <input type="hidden" name="post_id" value="{{ $post->id }}" />
    </div>
    <div>
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 ml-10">Add Comment</button>
    </div>
</form> --}}

<details class="bg-white shadow rounded group mb-4">
    <summary class="list-none flex flex-wrap items-center cursor-pointer
    focus-visible:outline-none focus-visible:ring focus-visible:ring-pink-500
    rounded group-open:rounded-b-none group-open:z-[1] relative
    ">
      <h3 class="flex flex-1 p-4 font-semibold">Comments</h3>
      <div class="flex w-10 items-center justify-center">
        <div class="border-8 border-transparent border-l-gray-600 ml-2
        group-open:rotate-90 transition-transform origin-left
        "></div>
      </div>
    </summary>
    <div class="p-4">
        @include('blog.commentsDisplay', ['comments' => $post->comments, 'post_id' => $post->id])

        <hr class="my-4">
        
        <form method="post" action="{{ route('comment.store') }}" class="my-4">
            @csrf
            <div class="mb-4 ml-10">
                <label for="body" class="block text-gray-700 font-bold mb-2">Add comment</label>
                <textarea class="form-textarea border rounded-lg px-3 py-2 w-full" name="body" rows="5"></textarea>
                <input type="hidden" name="post_id" value="{{ $post->id }}" />
            </div>
            <div>
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 ml-10">Add Comment</button>
            </div>
        </form>
    </div>
  </details>
@endif

@endsection 


