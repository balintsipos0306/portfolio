<?php

namespace App\Http\Controllers;

use App\Models\Webshop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class webshopController extends Controller
{
    public function store(Request $request)
    {
        // Validálás
        $request->validate([
            'title' => 'required|string|max:255',
            'text' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'price' => 'required|int',
        ]);
        
        $imagePath = $request->file('image')->store('webshop_items', 'public');

        // Új rekord mentése az adatbázisba
        Webshop::create([
            'name' => $request->title,
            'text' => $request->text,
            'image_path' => $imagePath,
            'price' => $request->price,
        ]);

        return redirect()->back()->with('Success', 'Termék feltöltése sikeres');
    }

    public function delete(Request $request){
        $id = $request->id;
        $item = DB::table('webshop')->where('id', $id)->first();

        if($item  && !empty($item->image_path))
        {
            $file_path = public_path('storage/' . $item->image_path);
            if (file_exists($file_path))
            {
                unlink($file_path);
                DB::table('webshop')->where('id', $id)->delete();
                return redirect()->back()->with('success', 'A termék törlése sikeres');
            }
        }
        return redirect()->back()->with('failed', 'A termék törlése sikertelen');
    }

    public function update(Request $request)
    {
        // Validálás
        $request->validate([
            'id' => 'required|int',
            'title' => 'required|string|max:255',
            'text' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'price' => 'required|int',
        ]);
        
        $oldItem = DB::table('webshop')->where('id', $request->id)->first();
        $image_path = $oldItem->image_path;
        $file_path = public_path('storage/' . $oldItem->image_path);

        // Új kép feltöltése, régi törlése
        if($request->hasFile('image'))
        {
            unlink($file_path);
            $image_path = $request->file('image')->store('webshop_items', 'public');
        }

        // Új rekord mentése az adatbázisba
        DB::table('webshop')->where('id', $request->id)->update([
            'name' => $request->title,
            'text' => $request->text,
            'image_path' => $image_path,
            'price' => $request->price
        ]);

        return redirect()->back()->with('Success', 'Termék módosítása sikeres');
    }
}