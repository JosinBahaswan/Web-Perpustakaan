<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Buku;

class PeminjamanController extends Controller
{
    // Index method untuk tampilan user
    public function userIndex()
    {
        $buku = Buku::all();
        return view('peminjaman.user_index', compact('buku'));
    }

    // Store method untuk menyimpan peminjaman dari tampilan user
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'id_buku' => 'required',
            'tanggal_pengembalian' => 'required|date',
        ]);

        // Simpan peminjaman baru ke database
        Peminjaman::create([
            'id_buku' => $request->id_buku,
            'tanggal_pengembalian' => $request->tanggal_pengembalian,
        ]);

        return redirect()->route('peminjaman.user_index')->with('success', 'Peminjaman berhasil disimpan.');
    }

    // Index method untuk tampilan admin
    public function adminIndex()
    {
        $peminjamans = Peminjaman::all();
        return view('perpustakaans.peminjaman.admin_index', compact('peminjamans'));
    }
}

