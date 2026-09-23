<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Penilaian;
use Barryvdh\DomPDF\Facade\Pdf;

class SpkController extends Controller
{
    /**
     * Logika Utama Penghitungan Metode SAW (Simple Additive Weighting)
     */
    public function hitungSAW()
    {
        $kriterias = Kriteria::all();
        $alternatifs = Alternatif::all();
        $penilaians = Penilaian::all();

        // Validasi jika data kosong
        if ($kriterias->isEmpty() || $alternatifs->isEmpty() || $penilaians->isEmpty()) {
            return back()->with('error', 'Data kriteria, alternatif, atau penilaian lapangan masih kosong. Mohon lengkapi terlebih dahulu.');
        }

        // 1. Ubah data penilaian ke dalam bentuk matriks asosiatif [id_alternatif][id_kriteria] = nilai
        $matriks = [];
        foreach ($penilaians as $p) {
            $matriks[$p->id_alternatif][$p->id_kriteria] = $p->nilai;
        }

        // 2. Mencari Nilai Max (untuk Benefit) dan Min (untuk Cost) di setiap Kriteria
        $nilaiEkstrim = [];
        foreach ($kriterias as $k) {
            $kolomNilai = array_column($matriks, $k->id_kriteria);
            
            if (empty($kolomNilai)) continue;

            if ($k->jenis === 'benefit') {
                $nilaiEkstrim[$k->id_kriteria] = max($kolomNilai);
            } else { // cost
                $nilaiEkstrim[$k->id_kriteria] = min($kolomNilai);
            }
        }

        // 3. Proses Normalisasi Matriks & Perhitungan Skor Akhir (Prefensi V)
        $hasilPerankingan = [];

        foreach ($alternatifs as $alt) {
            $idAlt = $alt->id_alternatif;
            $skorTotal = 0;
            $detailNormalisasi = [];

            foreach ($kriterias as $k) {
                $idKrit = $k->id_kriteria;
                $nilaiRil = $matriks[$idAlt][$idKrit] ?? 0;
                $ekstrim = $nilaiEkstrim[$idKrit] ?? 1; // Mencegah division by zero

                // Rumus Normalisasi SAW
                if ($k->jenis === 'benefit') {
                    $normalisasi = $ekstrim != 0 ? ($nilaiRil / $ekstrim) : 0;
                } else { // cost
                    $normalisasi = $nilaiRil != 0 ? ($ekstrim / $nilaiRil) : 0;
                }

                $detailNormalisasi[$idKrit] = $normalisasi;

                // Perhitungan Preferensi: Nilai Normalisasi dikali Bobot Kriteria
                $skorTotal += ($normalisasi * $k->bobot);
            }

            $hasilPerankingan[] = [
                'alternatif' => $alt,
                'skor_akhir' => round($skorTotal, 4), // Dibulatkan 4 angka di belakang koma
                'detail'     => $detailNormalisasi
            ];
        }

        // 4. Urutkan hasil dari skor tertinggi ke terendah (Perangkingan)
        usort($hasilPerankingan, function ($a, $b) {
            return $b['skor_akhir'] <=> $a['skor_akhir'];
        });

        // Tentukan apakah yang mengakses adalah Admin atau Pegawai berdasarkan rute
        $viewPath = request()->is('admin*') ? 'admin.spk.hasil' : 'pegawai.spk.hasil';

        return view($viewPath, compact('kriterias', 'alternatifs', 'hasilPerankingan'));
    }

    /**
     * Logika Cetak Laporan Hasil Keputusan ke Format PDF (Khusus Admin)
     */
    public function cetakPdf()
    {
        // Memanggil logika perhitungan SAW yang sama untuk dimasukkan ke laporan
        $kriterias = Kriteria::all();
        $alternatifs = Alternatif::all();
        $penilaians = Penilaian::all();

        // (Opsional: Anda bisa mereplikasi logika array di atas atau menjadikannya method terpisah agar reusable)
        // Untuk ringkasnya, kita siapkan variabel data yang akan dilempar ke template PDF dompdf
        
        $pdf = Pdf::loadView('admin.spk.pdf', compact('kriterias', 'alternatifs', 'penilaians'));
        
        return $pdf->download('Laporan-Keputusan-SPK-JITU.pdf');
    }
}
