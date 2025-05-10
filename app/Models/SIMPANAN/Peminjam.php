<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjam extends Model
{
    protected $table = 'peminjams'; // Sesuaikan dengan nama tabel yang digunakan

    protected $fillable = [
        'nama', 'email', 'nomor_telepon',
        // Tambahkan kolom lain yang dapat diisi di sini
    ];

    // Contoh relasi dengan peminjaman (one-to-many)
    public function peminjamans()
    {
        return $this->hasMany(Peminjaman::class, 'id_peminjam');
    }
}