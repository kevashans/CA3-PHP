@extends('layouts.app')

@section('content')
<div class="w-4/5 m-auto text-left">
    <div class="py-15">
        <h1 class="text-6xl">
            {{ $post->title }}
        </h1>
    </div>
</div>

<div class="w-4/5 m-auto pt-20">
    <span class="text-gray-500">
        By <span class="font-bold italic text-gray-800">{{ $post->user->name }}</span>, Created on {{ date('jS M Y', strtotime($post->updated_at)) }}
    </span>

    <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
        {{ $post->description }}
    </p>
</div>

<h4 class="text-lg font-bold">Display Comments</h4>

@include('blog.commentsDisplay', ['comments' => $post->comments, 'post_id' => $post->id])

<hr class="my-4">

<form method="post" action="{{ route('comment.store') }}" class="my-4">
    @csrf
    <div class="mb-4">
        <label for="body" class="block text-gray-700 font-bold mb-2">Add comment</label>
        <textarea class="form-textarea border rounded-lg px-3 py-2 w-full" name="body" rows="5"></textarea>
        <input type="hidden" name="post_id" value="{{ $post->id }}" />
    </div>
    <div>
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">Add Comment</button>
    </div>
</form>


@endsection 