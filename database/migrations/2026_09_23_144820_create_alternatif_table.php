<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('alternatif', function (Blueprint $table) {
            $table->id('id_alternatif'); // Primary Key kustom
            $table->string('kode_alternatif', 10);
            $table->string('nama_ikan', 100);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('alternatif');
    }
};