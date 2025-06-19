@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold mb-6">Photo Gallery</h2>

    <a href="{{ route('photos.create') }}"
       class="mb-4 inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
         Add New Photo
    </a>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded shadow">
            <thead class="bg-gray-100 text-left text-gray-700 uppercase text-sm">
                <tr>
                    <th class="px-6 py-3">#</th>
                    <th class="px-6 py-3">Title</th>
                    <th class="px-6 py-3">Description</th>
                    <th class="px-6 py-3">File</th>
                    <th class="px-6 py-3">Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($photos as $index => $photo)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $index + 1 }}</td>
                        <td class="px-6 py-4">{{ $photo->title }}</td>
                        <td class="px-6 py-4">{{ $photo->description }}</td>
                        <td class="px-6 py-4">
                            @if($photo->file)
                                <img src="{{ asset('storage/' . $photo->file) }}" class="w-20 h-20 object-cover rounded" alt="">
                            @else
                                N/A
                            @endif
                        </td>
                        <td class="px-6 py-4">{{ $photo->created_at->format('Y-m-d') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
