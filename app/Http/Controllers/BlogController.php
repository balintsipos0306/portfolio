<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function store(Request $request)
    {
        // Validálás
        $request->validate([
            'title' => 'required|string|max:255',
            'text' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'isPublished' => 'required|string|max:255'
        ]);

        // Kép feltöltése és tárolása
        $imagePath = $request->file('image')->store('blogImages', 'public');

        // Új rekord mentése az adatbázisba
        Blog::create([
            'title' => $request->title,
            'text' => $request->text,
            'image_path' => $imagePath,
            'isPublished' => $request->isPublished
        ]);

        return redirect()->back()->with('success', 'A kép sikeresen feltöltve.');
    }
}
