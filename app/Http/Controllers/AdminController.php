<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;

class AdminController extends Controller
{
    public function index()
    {
        // Mengambil data peminjaman buku dari database
        $peminjamanData = Peminjaman::all();

        // Mengembalikan tampilan dengan data peminjaman buku
        return view('perpustakaans.pinjam-buku', ['peminjamanData' => $peminjamanData]);
    }
    
    // Search data
    public function search(Request $request)
    {
        $search = $request->input('search');
        $peminjamanData = Peminjaman::where('judul_buku', 'like', "%$search%")
                                    ->orWhere('nama', 'like', "%$search%")
                                    ->get();
        return view('perpustakaans.pinjam-buku', compact('peminjamanData'));
    }

    // Delete data
    public function destroy($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->delete();

        return redirect()->route('perpustakaans.users.pinjam-buku')->with('success', 'Data deleted successfully.');
    }
}


