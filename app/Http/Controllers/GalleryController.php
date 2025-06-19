<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::with('user')->latest()->get();
        return view('galleries.index', compact('galleries'));
    }

    public function create()
    {
        return view('galleries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Gallery::create([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('galleries.index')->with('success', 'Gallery created.');
    }

    public function show(Gallery $gallery)
    {
        return view('galleries.show', compact('gallery'));
    }

    public function edit(Gallery $gallery)
    {
        return view('galleries.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $gallery->update($request->only('name', 'description'));

        return redirect()->route('galleries.index')->with('success', 'Gallery updated.');
    }

   public function destroy(Gallery $gallery)
{
    $this->authorize('delete', $gallery); 
    
    $gallery->delete();

    if (request()->expectsJson()) {
        return response()->json(['message' => 'Gallery deleted']);
    }

    return redirect()->route('galleries.index')->with('success', 'Gallery deleted');
}



}
