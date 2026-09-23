@extends('layouts.app')

@section('title', 'Dashboard Pegawai')

@section('content')
<!-- Banner Instruksi Kerja -->
<div class="bg-blue-900 rounded-3xl p-8 text-white mb-8 relative overflow-hidden shadow-lg border border-blue-800">
    <div class="absolute -right-20 -top-20 w-64 h-64 bg-blue-800 rounded-full blur-3xl opacity-60 pointer-events-none"></div>
    <div class="relative z-10">
        <h2 class="text-2xl font-bold mb-2 tracking-tight">Selamat Bertugas, {{ Session::get('nama_lengkap') }}! 🧑‍🌾</h2>
        <p class="text-blue-200 text-sm max-w-2xl leading-relaxed font-medium">
            Melalui dashboard ini, tugas Anda adalah memastikan dan memasukkan data penilaian riil dari lapangan berdasarkan kriteria kualitas dan operasional ikan ternak di Persada Mandiri Farm.
        </p>
    </div>
</div>

<!-- Alur Kerja / Panduan -->
<div class="bg-white rounded-3xl border border-slate-100 shadow-sm p-8">
    <div class="mb-6">
        <h3 class="text-lg font-bold text-slate-800 tracking-tight">Alur Kerja Pengisian SPK</h3>
        <p class="text-xs text-slate-500 mt-1">Ikuti 3 langkah sederhana di bawah ini untuk mengelola data penilaian.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 relative">
        <!-- Garis Penghubung (Hanya muncul di Desktop) -->
        <div class="hidden md:block absolute top-1/2 left-0 w-full h-0.5 bg-slate-100 -z-10 -translate-y-1/2"></div>

        <!-- Langkah 1 -->
        <div class="bg-white px-4 text-center">
            <div class="w-12 h-12 mx-auto rounded-full bg-blue-50 border-4 border-white text-blue-600 flex items-center justify-center font-bold text-lg mb-4 shadow-sm shadow-blue-100">1</div>
            <h4 class="text-sm font-bold text-slate-800 mb-2">Observasi Lapangan</h4>
            <p class="text-xs text-slate-500 leading-relaxed">Cek kondisi kualitas bibit, harga pasar, serta tingkat kematian dari masing-masing komoditas ikan.</p>
        </div>

        <!-- Langkah 2 -->
        <div class="bg-white px-4 text-center">
            <div class="w-12 h-12 mx-auto rounded-full bg-sky-50 border-4 border-white text-sky-600 flex items-center justify-center font-bold text-lg mb-4 shadow-sm shadow-sky-100">2</div>
            <h4 class="text-sm font-bold text-slate-800 mb-2">Input Matriks Penilaian</h4>
            <p class="text-xs text-slate-500 leading-relaxed">Masuk ke menu <b class="text-slate-700">Input Penilaian</b> dan masukkan angka riil sesuai data observasi untuk setiap kriteria.</p>
        </div>

        <!-- Langkah 3 -->
        <div class="bg-white px-4 text-center">
            <div class="w-12 h-12 mx-auto rounded-full bg-indigo-50 border-4 border-white text-indigo-600 flex items-center justify-center font-bold text-lg mb-4 shadow-sm shadow-indigo-100">3</div>
            <h4 class="text-sm font-bold text-slate-800 mb-2">Pantau Hasil SPK</h4>
            <p class="text-xs text-slate-500 leading-relaxed">Sistem akan secara otomatis melakukan normalisasi SAW dan menampilkan komoditas ikan terbaik.</p>
        </div>
    </div>

    <!-- Tombol Aksi Cepat -->
    <div class="mt-10 text-center">
        <a href="{{ route('pegawai.penilaian.index') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-8 py-3.5 rounded-xl font-bold text-sm shadow-lg shadow-blue-600/30 transition duration-200">
            Mulai Input Penilaian Sekarang &rarr;
        </a>
    </div>
</div>
@endsection