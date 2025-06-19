@extends('layouts.app')

@section('content')
<div class="container py-5">
    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="h4 text-uppercase fw-bold">{{ $gallery->name }}</h2>
            @if($gallery->description)
                <p class="text-muted">{{ $gallery->description }}</p>
            @endif
        </div>
        @if (auth()->user()->id === $gallery->user_id || auth()->user()->role?->name === 'admin')
            <a href="{{ route('photos.create', $gallery) }}" class="btn btn-primary">
                Add Photo
            </a>
        @endif
    </div>

    {{-- Photos --}}
    @if($gallery->photos->count())
        <div class="row">
            @foreach($gallery->photos as $photo)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        @if($photo->filename)
                            <img src="{{ asset('storage/photos/' . $photo->filename) }}" 
                                 class="card-img-top img-fluid" 
                                 alt="{{ $photo->title }}" 
                                 style="height: 200px; object-fit: cover;">
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $photo->title }}</h5>
                            <p class="card-text text-muted small flex-grow-1">{{ $photo->description }}</p>
                            <div class="d-flex justify-content-between mt-2">
                                <a href="{{ route('photos.show', $photo) }}" class="btn btn-outline-primary btn-sm">View</a>
                                @if (auth()->user()->id === $photo->user_id || auth()->user()->role?->name === 'admin')
                                    <div class="btn-group">
                                        <a href="{{ route('photos.edit', $photo) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form method="POST" action="{{ route('photos.destroy', $photo) }}"
                                              onsubmit="return confirm('Delete this photo?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-muted">This gallery has no photos yet.</p>
    @endif

    {{-- Back Button --}}
    <div class="mt-4">
        <a href="{{ route('galleries.index') }}" class="btn btn-secondary">← Back to Galleries</a>
    </div>
</div>
@endsection
