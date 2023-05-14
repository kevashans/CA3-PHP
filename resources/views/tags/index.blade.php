@extends('layouts.app')

@section('content')

<article class="container mx-auto">
    <header class="py-8 border-b border-gray-300 text-center">
      <h1 class="text-4xl font-bold">
        <span class="border-b-4 border-green-500 pb-2">Manage Tags</span>
      </h1>
    </header>
    <section class="mx-20 my-12">
      <form action="{{ route('tags.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-6">
          <label for="name" class="block text-gray-700 font-bold mb-2">Tag Name</label>
          <input id="name" name="name" type="text" class="border rounded-lg py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-green-500">
          <button type="submit" class="px-4 py-2 rounded-lg colored_button text-white font-bold uppercase tracking-wide hover:colored_button">Add Tag</button>
        </div>
        </form>
    </section>
    @if (session()->has('message'))
    <div class="w-4/5 mt-2 pl-2">
      <p class="w-3/5 mb-4 text-gray-50 colored_button rounded-2xl py-4 text-center">
        {{ session('message') }}
      </p>
    </div>
    @endif
  </article>
  
  
  
  
  
  


<table class="min-w-full divide-y divide-gray-200">
    <thead>
      <tr>
        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
          ID
        </th>
        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
          Name
        </th>
        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
          Edit
        </th>
        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
          Delete
        </th>
      </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
      @foreach ($tags as $item)
      <tr>
        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
          {{ $item->id }}
        </td>
        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
          {{ $item->name }}
        </td>
        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
          <a href="{{ route('tags.edit', $item->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
        </td>
        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
          <form action="{{ route('tags.destroy', $item->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  
@endsection
