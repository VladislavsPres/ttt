@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Photo to Gallery: {{ $gallery->title }}</h2>

    <form action="{{ route('photos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="gallery_id" value="{{ $gallery->id }}">

        <div class="mb-3">
            <label for="title" class="form-label">Photo Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Photo Description</label>
            <textarea name="description" class="form-control" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label for="file" class="form-label">Upload Photo (JPEG, PNG, max 2MB)</label>
            <input type="file" name="file" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Add Photo</button>
    </form>
</div>
@endsection
