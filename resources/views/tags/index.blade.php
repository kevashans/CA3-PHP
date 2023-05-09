@extends('layouts.app')

@section('content')
<div class="w-3/5 m-auto">
    <div class="py-16 border-b border-gray-200  text-center">
        <h1 class="text-5xl uppercase font-bold">
            Manage Tags
        </h1>
    </div>
    <form action="/tags" method="POST" enctype="multipart/form-data">
    @csrf
        <input name="name" type="text" class="rounded-lg border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 my-6 mr-0">
        <button type="submit" class="rounded-lg bg-sky-500 text-xs uppercase font-bold p-3 text-white ml-0 hover:bg-sky-600">Add tag</button>
    </form>
    @if (session()->has('message'))
    <div class="w-4/5 mt-2 pl-2">
        <p class="w-3/5 mb-4 text-gray-50 bg-green-500 rounded-2xl py-4 text-center">
            {{ session()->get('message') }}
        </p>
    </div>
    @endif
</div>





<table class="w-3/5 m-auto">
    <thead class="bg-white border-b">
        <tr>
        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
            #
        </th>
        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
            Tag name
        </th>
        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-right">
        </th>
        </tr>
    </thead>

    <tbody>
        @foreach ($tags as $tag) 

            @if ($loop->odd)
            <tr class="bg-gray-100 border-b">
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $tag->id }}</td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{ $tag->name }} 
                </td>
                <td class="text-sm text-gray-900 font-light py-4 text-center">
                <span>
                    <a href="/tags/{{ $tag->id }}/edit" class="text-gray-700 italic hover:text-gray-900 pb-1 border-b-2">Edit<i class= "ml-2 bi bi-pencil-square"></i></a>
                    <form class="inline-block" action="/tags/{{ $tag->id }}" method="POST" >
                            @csrf
                            @method('delete')
                        <button type="submit" class="text-red-500 font-light ml-8">Delete</button>
                        <i class= "ml-1 bi bi-trash text-red-500"></i>
                    </form>
                </span>
                </td>
            </tr>
            @elseif ($loop->even)
            <tr class="bg-white border-b">
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $tag->id }}</td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap" >
                    {{ $tag->name }} 
                </td>
                <td class="text-sm text-gray-900 font-light py-4 text-center">
                    <span>
                        <a href="/tags/{{ $tag->id }}/edit" class="text-gray-700 italic hover:text-gray-900 pb-1 border-b-2 ">Edit<i class= "ml-2 bi bi-pencil-square"></i></a>
                        <form class="inline-block" action="/tags/{{ $tag->id }}" method="POST" >
                                @csrf
                                @method('delete')
                            <button type="submit" class="text-red-500 font-light ml-8">Delete</button>
                            <i class= "ml-1 bi bi-trash text-red-500"></i>
                        </form>
                    </span>
                </td>
            </tr>

            @endif
        @endforeach
        
        

    </tbody>
</table>

@endsection