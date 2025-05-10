<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Perpustakaan;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StorePerpustakaanRequest;
use App\Http\Requests\UpdatePerpustakaanRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class PerpustakaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $Perpustakaans = Perpustakaan::when($search, function ($query, $search) {
            return $query->where('judul', 'like', '%' . $search . '%')
                    ->orWhere('id', 'like', '%' . $search . '%')
                    ->orWhere('penulis', 'like', '%' . $search . '%');
        })->get();
    
        return view('Perpustakaans.index', compact('Perpustakaans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response(view('Perpustakaans.create'));
    }

    /**
     * Store a newly created resource in storage.
     */
	public function store(StorePerpustakaanRequest $request)
    {

        $this->validate($request, [
            'judul'   => 'required|string',
            'penulis' => 'required|string',
            'gambar'  => 'required|image|mimes:png,jpg,jpeg',
            'ISBN'    => 'required|numeric',
            'jumlah'  => 'required|numeric',
        ]);
        
        // Upload image
        $gambar = $request->file('gambar');
        $filename = date('d-m-y').$gambar->getClientOriginalName();
        $path = 'storage/'.$filename;

        storage::disk('public')->put($path,file_get_contents($gambar));

        // $gambar->storeAs('public/Bukus', $gambar->hashName());
    
        $perpustakaan = Perpustakaan::create([
            'judul'   => $request->judul,
            'penulis' => $request->penulis,
            // 'gambar'  => $gambar->hashName(),
            'gambar'  => $filename,
            'ISBN'   => $request->ISBN,
            'jumlah'  => $request->jumlah,
        ]);
    
        if($perpustakaan){
            //redirect dengan pesan sukses
            return redirect()->route('Perpustakaans.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('Perpustakaans.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function show($id)
    {
        $perpustakaan = Perpustakaan::find($id);

        return view('perpustakaans.show', compact('perpustakaan'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        $perpustakaan = Perpustakaan::findOrFail($id);
        return response(view('Perpustakaans.edit', ['perpustakaan' => $perpustakaan]));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePerpustakaanRequest $request, string $id)
    {

        $perpustakaan = Perpustakaan::findOrFail($id);
    
        $this->validate($request, [
            'judul'   => 'required|string|max:100|unique:Perpustakaans,judul,' . $id,
            'penulis' => 'sometimes|required|string|max:100',
            'gambar'  => 'sometimes|image|mimes:png,jpg,jpeg',
            'ISBN'   => 'sometimes|required|numeric|min:1',
            'jumlah'  => 'sometimes|required|numeric|min:0',
        ]);
    
        // Check if a new image is uploaded
        if ($request->hasFile('gambar')) {
            // Delete the old image
            Storage::disk('public')->delete('storage/' . $perpustakaan->gambar);
    
            // Upload and save the new image
            $gambar = $request->file('gambar');
            $filename = date('d-m-y') . $gambar->getClientOriginalName();
            $path = 'storage/' . $filename;
            Storage::disk('public')->put($path, file_get_contents($gambar));
    
            $perpustakaan->gambar = $filename;
        }
    
        // Update other fields
        $perpustakaan->judul = $request->judul;
        $perpustakaan->penulis = $request->penulis;
        $perpustakaan->ISBN = $request->ISBN;
        $perpustakaan->jumlah = $request->jumlah;
    
        // Save the updated record
        $perpustakaan->save();
    
        return redirect()->route('Perpustakaans.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $perpustakaan = Perpustakaan::findOrFail($id);       
        
        Perpustakaan::deleting(function ($perpustakaan) {
            // Menghapus file gambar yang terkait dari penyimpanan (storage)
            Storage::disk('public')->delete('storage/' . $perpustakaan->gambar);
        });

        if ($perpustakaan->delete()) {
            return redirect(route('Perpustakaans.index'))->with('success', 'Deleted!');
        }

        return redirect(route('Perpustakaans.index'))->with('error', 'Sorry, unable to delete this!');
    }

    public function koleksi()
    {
        $perpustakaans = Perpustakaan::all(); // Mengambil semua data perpustakaan dari model

        return view('koleksi', compact('perpustakaans'));
    }

}
