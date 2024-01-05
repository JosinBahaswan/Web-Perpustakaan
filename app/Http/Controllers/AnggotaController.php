<?php

// app/Http/Controllers/AnggotaController.php
namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggota = Anggota::all();
        return view('anggota.anggota', compact('anggota'));
    }

    public function edit($id)
    {
        $anggota = Anggota::find($id);
        return view('anggota.anggotaedit', compact('anggota'));
    }

    public function update(Request $request, $id)
    {
        // Proses update anggota
    }

    public function destroy($id)
    {
        // Proses hapus anggota
    }
}

