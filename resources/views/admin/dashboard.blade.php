@extends('layouts.app')

@section('title', 'Dashboard Utama')

@section('content')
<!-- Banner Ucapan Selamat Datang -->
<div class="bg-blue-900 rounded-3xl p-8 text-white mb-8 relative overflow-hidden shadow-lg border border-blue-800">
    <div class="absolute -right-20 -top-20 w-64 h-64 bg-blue-800 rounded-full blur-3xl opacity-60 pointer-events-none"></div>
    <div class="absolute right-20 -bottom-20 w-48 h-48 bg-sky-600 rounded-full blur-3xl opacity-40 pointer-events-none"></div>
    
    <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold mb-2 tracking-tight">Selamat Datang di Pusat Kendali, {{ Session::get('nama_lengkap') ?? 'Admin' }}! 👋</h2>
            <p class="text-blue-200 text-sm max-w-2xl leading-relaxed font-medium">
                Sistem Pendukung Keputusan (SPK) metode SAW untuk Persada Mandiri Farm siap digunakan. Pantau data analitik dan hasil akhir rekomendasi ikan unggulan secara real-time di sini.
            </p>
        </div>
        <div class="hidden md:block">
            <a href="{{ route('admin.spk.hitung') }}" class="inline-flex items-center space-x-2 bg-white text-blue-900 hover:bg-sky-50 px-5 py-2.5 rounded-xl font-bold text-sm shadow-md transition duration-200">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                <span>Lihat Laporan SAW</span>
            </a>
        </div>
    </div>
</div>

<!-- Kartu Statistik Ringkasan -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm flex items-center space-x-5 hover:shadow-md transition duration-200">
        <div class="w-14 h-14 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center flex-shrink-0">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12c0-.85-.12-1.67-.35-2.45l2.1-1.8a1 1 0 00-.3-1.65l-2.75-.75a8.96 8.96 0 00-2.3-1.5l-.5-2.85a1 1 0 00-1.2-.8l-2.8.7c-.8-.2-1.62-.3-2.45-.3s-1.65.1-2.45.3l-2.8-.7a1 1 0 00-1.2.8l-.5 2.85c-.83.43-1.6 1-2.3 1.5L2.75 6.1a1 1 0 00-.3 1.65l2.1 1.8z"></path></svg>
        </div>
        <div>
            <div class="text-[11px] text-slate-400 font-bold uppercase tracking-wider mb-1">Total Komoditas</div>
            <div class="text-2xl font-extrabold text-slate-800">{{ $jumlahAlternatif ?? 3 }} <span class="text-sm font-medium text-slate-500">Ikan</span></div>
        </div>
    </div>

    <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm flex items-center space-x-5 hover:shadow-md transition duration-200">
        <div class="w-14 h-14 rounded-2xl bg-sky-50 text-sky-600 flex items-center justify-center flex-shrink-0">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
        </div>
        <div>
            <div class="text-[11px] text-slate-400 font-bold uppercase tracking-wider mb-1">Parameter SAW</div>
            <div class="text-2xl font-extrabold text-slate-800">{{ $jumlahKriteria ?? 5 }} <span class="text-sm font-medium text-slate-500">Kriteria</span></div>
        </div>
    </div>

    <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm flex items-center space-x-5 hover:shadow-md transition duration-200">
        <div class="w-14 h-14 rounded-2xl bg-indigo-50 text-indigo-600 flex items-center justify-center flex-shrink-0">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
        </div>
        <div>
            <div class="text-[11px] text-slate-400 font-bold uppercase tracking-wider mb-1">Petugas Lapangan</div>
            <div class="text-2xl font-extrabold text-slate-800">{{ $jumlahPegawai ?? 1 }} <span class="text-sm font-medium text-slate-500">Akun</span></div>
        </div>
    </div>
</div>

<!-- Visualisasi Data Interaktif (Chart.js) -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
    
    <!-- Bar Chart: Perbandingan Skor Alternatif -->
    <div class="bg-white rounded-3xl border border-slate-100 shadow-sm p-6 lg:col-span-2">
        <div class="mb-4">
            <h3 class="text-lg font-bold text-slate-800 tracking-tight">Perbandingan Skor Analisis SAW</h3>
            <p class="text-xs text-slate-500">Peringkat ikan gabus, mujair, dan patin berdasarkan perhitungan terbaru.</p>
        </div>
        <div class="relative h-72 w-full">
            <canvas id="barChartAlternatif"></canvas>
        </div>
    </div>

    <!-- Doughnut Chart: Komposisi Bobot Kriteria -->
    <div class="bg-white rounded-3xl border border-slate-100 shadow-sm p-6">
        <div class="mb-4">
            <h3 class="text-lg font-bold text-slate-800 tracking-tight">Distribusi Bobot Kriteria</h3>
            <p class="text-xs text-slate-500">Persentase pengaruh setiap variabel terhadap keputusan akhir.</p>
        </div>
        <div class="relative h-64 w-full flex items-center justify-center">
            <canvas id="doughnutChartKriteria"></canvas>
        </div>
    </div>
</div>

<!-- Pustaka Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Konfigurasi Global Chart.js agar estetik
        Chart.defaults.font.family = "'Plus Jakarta Sans', sans-serif";
        Chart.defaults.color = '#64748b';

        // 1. Data Bar Chart (Skor Alternatif Ikan)
        const ctxBar = document.getElementById('barChartAlternatif').getContext('2d');
        new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: ['Ikan Gabus', 'Ikan Mujair', 'Ikan Patin'], // Nantinya bisa di-looping dari database
                datasets: [{
                    label: 'Skor Preferensi (V)',
                    data: [0.85, 0.72, 0.91], // Angka dummy realistik, nanti diganti dengan data array real
                    backgroundColor: ['#3b82f6', '#0ea5e9', '#6366f1'], // Warna biru korporat
                    borderRadius: 8,
                    barThickness: 45
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: { beginAtZero: true, max: 1.0, grid: { borderDash: [4, 4], color: '#e2e8f0' } },
                    x: { grid: { display: false } }
                }
            }
        });

        // 2. Data Doughnut Chart (Bobot Kriteria)
        const ctxDoughnut = document.getElementById('doughnutChartKriteria').getContext('2d');
        new Chart(ctxDoughnut, {
            type: 'doughnut',
            data: {
                labels: ['C1 (Harga)', 'C2 (Keuntungan)', 'C3 (Permintaan)', 'C4 (Biaya)', 'C5 (Risiko)'],
                datasets: [{
                    data: [25, 30, 20, 15, 10], // Persentase bobot
                    backgroundColor: ['#1e3a8a', '#2563eb', '#38bdf8', '#818cf8', '#cbd5e1'],
                    borderWidth: 0,
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '70%',
                plugins: {
                    legend: { position: 'bottom', labels: { usePointStyle: true, boxWidth: 8 } }
                }
            }
        });
    });
</script>
@endsection