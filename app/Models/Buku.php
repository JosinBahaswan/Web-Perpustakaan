<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'buku';
    
    protected $fillable = ['judul', 'penulis', 'tahun_terbit', 'isbn'];

    // Tambahan metode atau relasi jika diperlukan
}
