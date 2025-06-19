@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h2 class="text-2xl font-bold mb-6">{{ __('My Photos') }}</h2>

    @if($photos->count())
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach ($photos as $photo)
                <div class="bg-white p-4 rounded shadow">
                    <h3 class="font-semibold text-lg">{{ $photo->title }}</h3>
                    <p class="text-sm text-gray-600 mb-2">{{ $photo->description }}</p>
                    @if($photo->file)
                        <img src="{{ asset('storage/' . $photo->file) }}" alt="{{ $photo->title }}" class="w-full h-48 object-cover rounded">
                    @endif
                    <p class="text-xs text-gray-400 mt-2">{{ $photo->created_at->format('d.m.Y H:i') }}</p>
                </div>
            @endforeach
        </div>

        <div class="mt-6">
            {{ $photos->links() }}
        </div>
    @else
        <p class="text-gray-500">You haven't uploaded any photos yet.</p>
    @endif
</div>
@endsection
