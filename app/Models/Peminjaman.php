<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';

    protected $fillable = [
        'nama',
        'nomor_anggota',
        'judul_buku',
        'tanggal_peminjaman',
        'tanggal_pengembalian',
    ];    
}
