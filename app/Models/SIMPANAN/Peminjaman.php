<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjaman';

    protected $fillable = ['id_buku', 'id_peminjam', 'tanggal_pengembalian'];

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'id_buku');
    }

    // Relasi dengan Peminjam (many-to-one)
    public function peminjam()
    {
        return $this->belongsTo(Peminjam::class, 'id_peminjam');
    }
}

