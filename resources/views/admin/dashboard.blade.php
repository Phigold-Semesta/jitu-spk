@extends('layouts.app')

@section('title', 'Dashboard Utama')

@section('content')
<!-- Banner Ucapan Selamat Datang -->
<div class="bg-blue-900 rounded-3xl p-8 text-white mb-8 relative overflow-hidden shadow-lg border border-blue-800">
    <!-- Aksen Gelombang Latar -->
    <div class="absolute -right-20 -top-20 w-64 h-64 bg-blue-800 rounded-full blur-3xl opacity-60 pointer-events-none"></div>
    <div class="absolute right-20 -bottom-20 w-48 h-48 bg-sky-600 rounded-full blur-3xl opacity-40 pointer-events-none"></div>
    
    <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold mb-2 tracking-tight">Selamat Datang di Pusat Kendali, {{ Session::get('nama_lengkap') }}! 👋</h2>
            <p class="text-blue-200 text-sm max-w-2xl leading-relaxed font-medium">
                Sistem Pendukung Keputusan (SPK) metode SAW untuk Persada Mandiri Farm siap digunakan. Anda dapat memantau data kriteria, alternatif komoditas ikan, dan melihat hasil akhir rekomendasi di sini.
            </p>
        </div>
        <div class="hidden md:block">
            <a href="{{ route('admin.spk.hitung') }}" class="inline-flex items-center space-x-2 bg-white text-blue-900 hover:bg-sky-50 px-5 py-2.5 rounded-xl font-bold text-sm shadow-md transition duration-200">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                <span>Lihat Hasil SPK</span>
            </a>
        </div>
    </div>
</div>

<!-- Kartu Statistik Ringkasan -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    
    <!-- Kartu: Jumlah Alternatif (Ikan) -->
    <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm flex items-center space-x-5 hover:shadow-md transition duration-200">
        <div class="w-14 h-14 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center flex-shrink-0">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12c0-.85-.12-1.67-.35-2.45l2.1-1.8a1 1 0 00-.3-1.65l-2.75-.75a8.96 8.96 0 00-2.3-1.5l-.5-2.85a1 1 0 00-1.2-.8l-2.8.7c-.8-.2-1.62-.3-2.45-.3s-1.65.1-2.45.3l-2.8-.7a1 1 0 00-1.2.8l-.5 2.85c-.83.43-1.6 1-2.3 1.5L2.75 6.1a1 1 0 00-.3 1.65l2.1 1.8C4.37 10.33 4.25 11.15 4.25 12s.12 1.67.35 2.45l-2.1 1.8a1 1 0 00.3 1.65l2.75.75c.7.5 1.47 1.07 2.3 1.5l.5 2.85a1 1 0 001.2.8l2.8-.7c.8.2 1.62.3 2.45.3s1.65-.1 2.45-.3l2.8.7a1 1 0 001.2-.8l.5-2.85c.83-.43 1.6-1 2.3-1.5l2.75-.75a1 1 0 00.3-1.65l-2.1-1.8c.23-.78.35-1.6.35-2.45z"></path></svg>
        </div>
        <div>
            <div class="text-[11px] text-slate-400 font-bold uppercase tracking-wider mb-1">Total Alternatif Ikan</div>
            <div class="text-2xl font-extrabold text-slate-800">{{ $jumlahAlternatif ?? 0 }} <span class="text-sm font-medium text-slate-500">Jenis</span></div>
        </div>
    </div>

    <!-- Kartu: Jumlah Kriteria -->
    <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm flex items-center space-x-5 hover:shadow-md transition duration-200">
        <div class="w-14 h-14 rounded-2xl bg-sky-50 text-sky-600 flex items-center justify-center flex-shrink-0">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
        </div>
        <div>
            <div class="text-[11px] text-slate-400 font-bold uppercase tracking-wider mb-1">Kriteria Penilaian</div>
            <div class="text-2xl font-extrabold text-slate-800">{{ $jumlahKriteria ?? 0 }} <span class="text-sm font-medium text-slate-500">Parameter</span></div>
        </div>
    </div>

    <!-- Kartu: Jumlah Pegawai -->
    <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm flex items-center space-x-5 hover:shadow-md transition duration-200">
        <div class="w-14 h-14 rounded-2xl bg-indigo-50 text-indigo-600 flex items-center justify-center flex-shrink-0">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
        </div>
        <div>
            <div class="text-[11px] text-slate-400 font-bold uppercase tracking-wider mb-1">Petugas Lapangan</div>
            <div class="text-2xl font-extrabold text-slate-800">{{ $jumlahPegawai ?? 0 }} <span class="text-sm font-medium text-slate-500">Akun</span></div>
        </div>
    </div>
</div>
@endsection