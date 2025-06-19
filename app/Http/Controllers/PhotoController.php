<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ActivityLog;

class PhotoController extends Controller
{
    public function index()
    {
        $photos = Photo::latest()->get();
        return view('photos.index', compact('photos'));
    }


    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'gallery_id' => 'required|exists:galleries,id',
        'file' => 'nullable|image|max:2048',
    ]);

    $gallery = Gallery::findOrFail($request->gallery_id);
    $user = auth()->user();

    if ($gallery->user_id !== $user->id && $user->role->name !== 'admin') {
        abort(403, 'You are not allowed to upload photos to this gallery.');
    }

    $filename = null;
    if ($request->hasFile('file')) {
        $filename = time() . '_' . $request->file('file')->getClientOriginalName();
        $request->file('file')->storeAs('public/photos', $filename);
    }

$photo = Photo::create([
    'title' => $request->title,
    'description' => $request->description,
    'filename' => $filename,
    'gallery_id' => $gallery->id,
    'user_id' => $user->id,
]);





    return redirect()->route('galleries.show', $gallery->id)->with('success', 'Photo added.');
}

public function myPhotos()
{
    $photos = \App\Models\Photo::where('user_id', Auth::id())
                ->latest()
                ->paginate(10);

    return view('photos.my', compact('photos'));
}


    public function show(Photo $photo)
    {
        return view('photos.show', compact('photo'));
    }

    public function edit(Photo $photo)
    {
        return view('photos.edit', compact('photo'));
    }

    public function update(Request $request, Photo $photo)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'nullable|image|max:2048',
        ]);

        $photo->update($request->only('title', 'description'));

        if ($request->hasFile('file')) {
            $filename = time() . '_' . $request->file('file')->getClientOriginalName();
            $request->file('file')->storeAs('public/photos', $filename);
            $photo->filename = $filename;
            $photo->save();
        }

        return redirect()->route('photos.show', $photo)->with('success', 'Photo updated.');

    }

    public function destroy(Photo $photo)
    {
        $photo->delete();
        


  return redirect()->route('galleries.show', $photo->gallery_id)->with('success', 'Photo deleted.');
   
    }

    public function create(Gallery $gallery)
{
    $user = auth()->user();

    if ($gallery->user_id !== $user->id && $user->role->name !== 'admin') {
        abort(403, 'You are not allowed to add photos to this gallery.');
    }


    return view('photos.create', compact('gallery'));
}

}
