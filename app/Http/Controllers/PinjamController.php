<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use Illuminate\Support\Facades\DB;

class PinjamController extends Controller
{
    public function index()
    {
        return view('pinjam');
    }

    public function submitPinjam(Request $request)
    {
        
        // Validasi formulir
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'nomor_anggota' => 'nullable|string',
            'judul_buku' => 'required|string',
            'tanggal_peminjaman' => 'required|date',
            'tanggal_pengembalian' => 'required|date|after:tanggal_peminjaman',
        ]);

        // Simpan data peminjaman ke dalam tabel menggunakan Eloquent
        Peminjaman::create($validatedData);

        // Redirect ke halaman admin atau tampilkan pesan berhasil
        return redirect()->route('sukses.peminjaman')->with('success', 'Peminjaman berhasil diajukan.');
    }
}
