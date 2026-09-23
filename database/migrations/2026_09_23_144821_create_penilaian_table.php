<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('penilaian', function (Blueprint $table) {
            $table->id('id_penilaian'); // Primary Key kustom
            
            // Foreign Key merujuk ke Primary Key kustom masing-masing tabel
            $table->unsignedBigInteger('id_alternatif');
            $table->foreign('id_alternatif')->references('id_alternatif')->on('alternatif')->onDelete('cascade');

            $table->unsignedBigInteger('id_kriteria');
            $table->foreign('id_kriteria')->references('id_kriteria')->on('kriteria')->onDelete('cascade');

            $table->unsignedBigInteger('id_pengguna')->nullable();
            $table->foreign('id_pengguna')->references('id_pengguna')->on('pengguna')->onDelete('set null');

            $table->float('nilai');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penilaian');
    }
};