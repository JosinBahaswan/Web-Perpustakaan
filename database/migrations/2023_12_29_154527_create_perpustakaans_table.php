<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('perpustakaans', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('penulis');
            $table->string('gambar')->nullable();
            $table->integer('ISBN')->default(0);
            $table->integer('jumlah')->default(0);
            $table->timestamps();
        });

        // Schema::create('book', function (Blueprint $tabel) {
        //     $table->integer('ID buku')->default(20);
        //     $table->integer('ID penerbit')->default(20);
        //     $table->integer('ID kategori')->default(30);
        //     $table->integer('ID pengarang')->default(30);
        //     $table->year('tahun terbit');
        //     $table->string('status ketersediaan')->defailt('');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Perpustakaans');
        // schema::dropIfExists('book');
    }
};
