<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;

class SubController extends Controller
{
    public function store(Request $request)
    {
        // Validálás
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
        ]);

        // Új rekord mentése az adatbázisba
        Subscription::create([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->back()->with('success', 'Sikeres feliratkozás');
    }
}
