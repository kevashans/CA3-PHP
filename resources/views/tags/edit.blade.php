@extends('layouts.app')

@section('content')
    <div class="w-3/5 m-auto">
        <div class="py-16 border-b border-gray-200  text-center">
            <h1 class="text-5xl uppercase font-bold">
                Edit Tag
            </h1>
        </div>

        @if (session()->has('message'))
            <div class="w-4/5 mt-2 pl-2">
                <p class="w-3/5 mb-4 text-gray-50 bg-green-500 rounded-2xl py-4 text-center">
                    {{ session()->get('message') }}
                </p>
            </div>
        @endif
    </div>


    <form action="/tags/{{ $tag->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        #{{ $tag->id }}

        <input name="name" value="{{ $tag->name }}"
            class="p-2 rounded-lg border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
            autofocus>


        <button type="submit"
            class="rounded-full bg-sky-500 text-sm uppercase font-bold px-5 p-2.5 text-white ml-0 hover:bg-sky-600">Edit
            tag</button>
    </form>
    </tbody>
@endsection
