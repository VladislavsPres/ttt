@extends('layouts.app')

@section('title', 'Galleries')

@section('header')
    <div class="flex justify-between items-center">
        <h1 class="text-xl uppercase font-bold">Galleries</h1>
        <a href="{{ route('galleries.create') }}" class="border-2 border-black px-4 py-1 uppercase text-sm hover:bg-black hover:text-white transition">Create New Gallery</a>
    </div>
@endsection

@section('content')
    <div class="space-y-6">
        @foreach ($galleries as $gallery)
            <div id="gallery-{{ $gallery->id }}" class="border-2 border-black p-4">
                <h2 class="text-lg uppercase font-semibold">{{ $gallery->name }}</h2>
                @if ($gallery->description)
                    <p class="mt-1 text-sm">{{ $gallery->description }}</p>
                @endif

                <p class="mt-2 text-xs uppercase text-gray-700">Author: {{ $gallery->user->name }}</p>

                <div class="mt-3 space-x-2">
                    <a href="{{ route('galleries.show', $gallery) }}" class="text-sm border-b border-black">View</a>
                    <a href="{{ route('galleries.edit', $gallery) }}" class="text-sm border-b border-black">Edit</a>
                    <button 
    class="delete-gallery-btn px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 text-sm"
    data-id="{{ $gallery->id }}"
>
    {{ __('Delete') }}
</button>

                </div>
            </div>
        @endforeach
    </div>
@endsection

@push('scripts')
<script>
document.querySelectorAll('.delete-gallery-btn').forEach(button => {
    button.addEventListener('click', function () {
        const id = this.dataset.id;
        if (!confirm('Are you sure you want to delete this gallery?')) return;

        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        fetch(`/galleries/${id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': token,
                'Accept': 'application/json'
            }
        })
        .then(response => {
            if (!response.ok) throw new Error('Delete failed');
            return response.json();
        })
        .then(data => {
            alert(data.message);
            document.getElementById(`gallery-${id}`).remove();
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Something went wrong!');
        });
    });
});

</script>
@endpush


