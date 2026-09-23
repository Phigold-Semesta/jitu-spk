<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kriteria;

class KriteriaSeeder extends Seeder
{
    public function run(): void
    {
        $kriteria = [
            ['kode_kriteria' => 'C1', 'nama_kriteria' => 'Harga Jual per Kg', 'jenis' => 'benefit', 'bobot' => 0.25],
            ['kode_kriteria' => 'C2', 'nama_kriteria' => 'Keuntungan Bersih per Siklus', 'jenis' => 'benefit', 'bobot' => 0.30],
            ['kode_kriteria' => 'C3', 'nama_kriteria' => 'Tingkat Permintaan Pasar', 'jenis' => 'benefit', 'bobot' => 0.20],
            ['kode_kriteria' => 'C4', 'nama_kriteria' => 'Biaya Pakan dan Perawatan', 'jenis' => 'cost', 'bobot' => 0.15],
            ['kode_kriteria' => 'C5', 'nama_kriteria' => 'Tingkat Kematian / Risiko', 'jenis' => 'cost', 'bobot' => 0.10],
        ];

        foreach ($kriteria as $item) {
            Kriteria::create($item);
        }
    }
}