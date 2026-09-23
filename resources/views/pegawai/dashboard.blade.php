@extends('layouts.app')

@section('title', 'Dashboard Pegawai')

@section('content')
<!-- Banner Instruksi Kerja -->
<div class="bg-blue-900 rounded-3xl p-8 text-white mb-8 relative overflow-hidden shadow-lg border border-blue-800">
    <div class="absolute -right-20 -top-20 w-64 h-64 bg-blue-800 rounded-full blur-3xl opacity-60 pointer-events-none"></div>
    <div class="relative z-10 flex flex-col md:flex-row justify-between items-center">
        <div>
            <h2 class="text-2xl font-bold mb-2 tracking-tight">Selamat Bertugas, {{ Session::get('nama_lengkap') ?? 'Petugas' }}! 🧑‍🌾</h2>
            <p class="text-blue-200 text-sm max-w-2xl leading-relaxed font-medium">
                Melalui dashboard ini, tugas Anda adalah memastikan dan memasukkan data penilaian riil dari lapangan berdasarkan 5 kriteria kualitas untuk masing-masing komoditas ikan ternak.
            </p>
        </div>
        <div class="mt-6 md:mt-0">
             <a href="{{ route('pegawai.penilaian.index') }}" class="inline-block bg-white text-blue-700 hover:bg-sky-50 px-6 py-3 rounded-xl font-bold text-sm shadow-md transition duration-200">
                Input Matriks Sekarang &rarr;
            </a>
        </div>
    </div>
</div>

<!-- Layout Visualisasi & Alur Kerja Pegawai -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
    
    <!-- Alur Kerja -->
    <div class="bg-white rounded-3xl border border-slate-100 shadow-sm p-6 lg:col-span-2">
        <h3 class="text-lg font-bold text-slate-800 tracking-tight mb-6">Alur Pengumpulan Data Lapangan</h3>
        
        <div class="space-y-6">
            <div class="flex items-start space-x-4">
                <div class="w-10 h-10 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center font-bold flex-shrink-0">1</div>
                <div>
                    <h4 class="text-sm font-bold text-slate-800">Observasi Kualitas Air & Pertumbuhan</h4>
                    <p class="text-xs text-slate-500 mt-1">Lakukan pengecekan kondisi bibit dan catat persentase tingkat kematian ikan di kolam secara berkala.</p>
                </div>
            </div>
            <div class="flex items-start space-x-4">
                <div class="w-10 h-10 rounded-full bg-sky-50 text-sky-600 flex items-center justify-center font-bold flex-shrink-0">2</div>
                <div>
                    <h4 class="text-sm font-bold text-slate-800">Analisa Biaya & Harga Pasar</h4>
                    <p class="text-xs text-slate-500 mt-1">Cek pengeluaran biaya pakan (cost) dan bandingkan dengan harga jual serta keuntungan bersih (benefit).</p>
                </div>
            </div>
            <div class="flex items-start space-x-4">
                <div class="w-10 h-10 rounded-full bg-indigo-50 text-indigo-600 flex items-center justify-center font-bold flex-shrink-0">3</div>
                <div>
                    <h4 class="text-sm font-bold text-slate-800">Validasi Data ke Sistem SPK</h4>
                    <p class="text-xs text-slate-500 mt-1">Masukkan data dalam bentuk matriks angka pasti agar sistem dapat mengkalkulasi komoditas unggulan.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Visualisasi Radar Chart: Intensitas Kriteria Lapangan -->
    <div class="bg-white rounded-3xl border border-slate-100 shadow-sm p-6">
        <div class="mb-4">
            <h3 class="text-lg font-bold text-slate-800 tracking-tight">Fokus Pengawasan Lapangan</h3>
            <p class="text-xs text-slate-500">Sebaran intensitas kriteria yang paling dipantau di kolam.</p>
        </div>
        <div class="relative h-64 w-full flex items-center justify-center">
            <canvas id="radarChartPegawai"></canvas>
        </div>
    </div>
</div>

<!-- Pustaka Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        Chart.defaults.font.family = "'Plus Jakarta Sans', sans-serif";
        Chart.defaults.color = '#64748b';

        // Data Radar Chart (Fokus Pengawasan Pegawai)
        const ctxRadar = document.getElementById('radarChartPegawai').getContext('2d');
        new Chart(ctxRadar, {
            type: 'radar',
            data: {
                labels: ['Perawatan', 'Tingkat Kematian', 'Kualitas Bibit', 'Pakan', 'Permintaan'],
                datasets: [{
                    label: 'Intensitas Harian (%)',
                    data: [80, 95, 70, 85, 60],
                    backgroundColor: 'rgba(56, 189, 248, 0.2)', // Sky blue transparan
                    borderColor: '#0284c7', // Sky 600
                    pointBackgroundColor: '#0284c7',
                    borderWidth: 2,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    r: {
                        angleLines: { color: '#e2e8f0' },
                        grid: { color: '#e2e8f0' },
                        pointLabels: { font: { size: 10 } },
                        ticks: { display: false } // Sembunyikan angka di tengah jaring
                    }
                },
                plugins: {
                    legend: { display: false }
                }
            }
        });
    });
</script>
@endsection