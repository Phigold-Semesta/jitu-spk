<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pengguna;
use Illuminate\Support\Facades\Hash;

class PenggunaSeeder extends Seeder
{
    public function run(): void
    {
        $pengguna = Pengguna::create([
            'nama_lengkap' => 'Pemilik Usaha (Admin)',
            'username'     => 'admin',
            'password'     => Hash::make('password123'),
            'peran'        => 'admin',
        ]);

        Pengguna::create([
            'nama_lengkap' => 'Petugas Lapangan (Pegawai)',
            'username'     => 'pegawai',
            'password'     => Hash::make('password123'),
            'peran'        => 'pegawai',
        ]);
    }
}