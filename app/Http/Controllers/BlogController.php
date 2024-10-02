<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    public function delete(Request $request)
    {
        $id = $request->id;
        $blog = DB::table('blogs')->where('id', $id)->first();

        if($blog  && !empty($blog->image_path))
        {
            $file_path = public_path('storage/' . $blog->image_path);
            if (file_exists($file_path))
            {
                unlink($file_path);
                DB::table('blogs')->where('id', $id)->delete();
                return redirect()->back()->with('success', 'A blog törlése sikeres');
            }
        }
        return redirect()->back()->with('failed', 'A blog törlése sikertelen');

    }
}
