<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengguna', function (Blueprint $table) {
            $table->id('id_pengguna'); // Primary Key kustom
            $table->string('nama_lengkap', 100);
            $table->string('username', 50)->unique();
            $table->string('password');
            $table->enum('peran', ['admin', 'pegawai']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengguna');
    }
};