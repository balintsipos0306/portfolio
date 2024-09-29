<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function store(Request $request)
    {
        // Validálás
        $request->validate([
            'category' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Kép feltöltése és tárolása
        $imagePath = $request->file('image')->store('images', 'public');

        // Új rekord mentése az adatbázisba
        Gallery::create([
            'category' => $request->title,
            'image_path' => $imagePath,
        ]);

        return redirect()->back()->with('success', 'A kép sikeresen feltöltve.');
    }
}
