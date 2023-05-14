@extends('layouts.app')

@section('content')
<div class="w-4/5 m-auto text-left">
    <div class="py-15">
        <h1 class="text-6xl">
            Create Forum
        </h1>
    </div>
</div>

<div class="w-4/5 m-auto pt-20">
    <form 
        action="/forums"
        method="POST"
        enctype="multipart/form-data">
        @csrf

        <input 
            type="text"
            name="topic_name"
            placeholder="Title..."
            class="bg-transparent block border-b-2 w-full h-20 text-6xl outline-none">

        <textarea 
            name="topic_description"
            placeholder="Description..."
            class="py-20 bg-transparent block border-b-2 w-full h-60 text-xl outline-none"></textarea>

            <div class="bg-grey-lighter pt-15">
                <label class="w-44 flex flex-col items-center px-2 py-3 bg-white-rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer">
                    <span class="mt-2 text-base leading-normal">
                        Select a file
                    </span>
                    <input 
                        type="file"
                        name="image"
                        class="hidden">
                </label>
            </div>

        <button    
            type="submit"
            class="uppercase mt-15 colored_button text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
            Create Forum
        </button>
        @foreach ($tags as $tag)
        <span class="m-3">
            
            <input class="rounded" type="checkbox" name="tags[]" value= {{ $tag->name }} id={{ $tag->name }}>
            <label class="ml-2" for={{ $tag->name }}>{{ $tag->name }}</label>
        </span>
        @endforeach
    </form>
</div>

@endsection