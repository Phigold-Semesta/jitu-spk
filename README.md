<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/Phigold-Semesta/jitu-spk/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Tentang JITU (Jenis Ikan Ternak Unggulan)

**JITU** adalah aplikasi web Sistem Pendukung Keputusan (SPK) berbasis **Laravel 13** yang dirancang khusus untuk studi kasus pada usaha budidaya ikan air tawar **Persada Mandiri Farm**[cite: 7]. Aplikasi ini menerapkan metode matematis **Simple Additive Weighting (SAW)** untuk membantu pemilik usaha dalam menentukan prioritas pengembangan komoditas ikan secara objektif, terstruktur, dan berbasis data nyata[cite: 7].

Alih-alih mengandalkan intuisi atau perkiraan semata[cite: 7], JITU mengevaluasi berbagai alternatif komoditas utama—seperti Ikan Gabus, Ikan Mujair, dan Ikan Patin[cite: 7]—berdasarkan lima parameter kriteria utama:
1. **Harga Jual per Kg** (*Benefit*)[cite: 7]
2. **Keuntungan Bersih per Siklus Panen** (*Benefit*)[cite: 7]
3. **Tingkat Permintaan Pasar** (*Benefit*)[cite: 7]
4. **Biaya Pakan dan Perawatan per Siklus** (*Cost*)[cite: 7]
5. **Tingkat Kematian / Risiko** (*Cost*)[cite: 7]

## Hak Akses Pengguna (Roles)

Aplikasi JITU membagi fungsionalitas ke dalam dua peran utama untuk menjaga integritas data dan proses bisnis:
* **Admin (Pemilik Usaha):** Memiliki hak akses penuh untuk mengelola data master kriteria, bobot, jenis kriteria (*benefit/cost*), data alternatif ikan, manajemen akun pegawai, hingga mengeksekusi perhitungan dan mencetak laporan keputusan resmi[cite: 7].
* **Pegawai (Petugas Lapangan):** Berperan sebagai operator yang menginput data primer operasional harian atau berkala langsung dari kolam ke dalam sistem[cite: 7].

## Fitur Utama

- [x] Manajemen Autentikasi Pengguna (Admin & Pegawai)
- [x] Pengelolaan Data Kriteria dan Bobot Nilai secara Dinamis
- [x] Pengelolaan Data Alternatif Komoditas Ikan Tawar[cite: 7]
- [x] Input Penilaian Matriks Keputusan Berbasis Data Lapangan[cite: 7]
- [x] Mesin Perhitungan Otomatis Metode *Simple Additive Weighting* (SAW)[cite: 7]
- [x] Cetak Laporan Hasil Keputusan / Perangkingan Berbasis PDF[cite: 7]

## Memulai Pengembangan (Getting Started)

Ikuti langkah-langkah berikut untuk menjalankan proyek ini di lingkungan lokal Anda:

1. **Clone Repositori**
   ```bash
   git clone [https://github.com/Phigold-Semesta/jitu-spk.git](https://github.com/Phigold-Semesta/jitu-spk.git)
   cd jitu-spk
