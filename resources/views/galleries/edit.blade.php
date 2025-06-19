@extends('layouts.app')

@section('content')
<div class="container mx-auto py-12">
    <h1 class="text-2xl font-bold mb-6">Edit Gallery</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('galleries.update', $gallery->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-semibold mb-2">Gallery Name</label>
            <input type="text" name="name" value="{{ old('name', $gallery->name) }}" class="w-full border border-gray-800 p-2">
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-2">Description</label>
            <textarea name="description" class="w-full border border-gray-800 p-2">{{ old('description', $gallery->description) }}</textarea>
        </div>

        <div class="flex gap-4">
            <button class="bg-black text-white px-4 py-2 uppercase border border-black">Update</button>
            <a href="{{ route('galleries.index') }}" class="px-4 py-2 border border-black text-black hover:bg-black hover:text-white transition">Back</a>
        </div>
    </form>
</div>
@endsection
