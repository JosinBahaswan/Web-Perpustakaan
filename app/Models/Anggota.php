<?php

// app/Models/Anggota.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table = 'anggota'; // Sesuaikan dengan nama tabel yang Anda gunakan

    protected $fillable = [
        'nama', 'nim', 'kelas', 'jurusan', 'tanggal_lahir', 'alamat', 'email', 'password'
    ];

    // Tambahan properti atau metode lainnya sesuai kebutuhan
}
