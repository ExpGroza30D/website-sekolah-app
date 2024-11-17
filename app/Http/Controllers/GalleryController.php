<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->get();
        return view('welcome', compact('galleries'));
    }

    public function show(Gallery $gallery)
    {
        return view('gallery.show', compact('gallery'));
    }

    public function comment(Request $request, Gallery $gallery)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'comment' => 'required|string'
        ]);

        $comment = $gallery->comments()->create([
            'name' => $request->name ?? 'Anonymous',
            'comment' => $request->comment
        ]);

        return response()->json($comment);
    }
}