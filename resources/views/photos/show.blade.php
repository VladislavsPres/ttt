@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $photo->title }}</h1>
    <p>{{ $photo->description }}</p>

    <img src="{{ asset('storage/photos/' . $photo->filename) }}" alt="photo" style="max-width: 400px;" class="img-fluid my-3">

    <div>
        <a href="{{ route('photos.edit', $photo) }}" class="btn btn-warning">Edit</a>
        <a href="{{ route('photos.destroy', $photo) }}" class="btn btn-danger"
           onclick="return confirm('Delete this photo?')">Delete</a>
        <a href="{{ route('galleries.show', $photo->gallery_id) }}" class="btn btn-secondary">Back</a>
    </div>
</div>
@endsection
