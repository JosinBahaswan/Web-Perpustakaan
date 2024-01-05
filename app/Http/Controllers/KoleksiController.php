<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KoleksiController extends Controller
{
    public function index()
    {
        // You can add logic here to fetch and pass data to the view
        return view('koleksi'); // Assuming you have a view file at resources/views/koleksi/index.blade.php
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $imageName);

        // Store data in the database
        // Assuming you have a model called Koleksi with 'title', 'author', and 'image' as fields
        $koleksi = new Koleksi();
        $koleksi->title = $request->title;
        $koleksi->author = $request->author;
        $koleksi->image = $imageName;
        $koleksi->save();

        return redirect()->route('koleksi.index')->with('success', 'Koleksi created successfully.');
    }
}