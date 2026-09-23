<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Alternatif;

class AlternatifSeeder extends Seeder
{
    public function run(): void
    {
        $alternatif = [
            ['kode_alternatif' => 'A1', 'nama_ikan' => 'Ikan Gabus'],
            ['kode_alternatif' => 'A2', 'nama_ikan' => 'Ikan Mujair'],
            ['kode_alternatif' => 'A3', 'nama_ikan' => 'Ikan Patin'],
        ];

        foreach ($alternatif as $item) {
            Alternatif::create($item);
        }
    }
}