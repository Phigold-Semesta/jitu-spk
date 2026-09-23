<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') - JITU SPK | Persada Mandiri Farm</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        /* Scrollbar custom agar lebih estetik */
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 antialiased flex h-screen overflow-hidden">

    <!-- SIDEBAR (Menu Navigasi Kiri) -->
    <aside class="w-72 bg-blue-900 text-white flex flex-col shadow-2xl relative z-20 flex-shrink-0">
        
        <!-- Aksen Dekoratif Sidebar -->
        <div class="absolute -top-24 -left-24 w-64 h-64 bg-blue-800 rounded-full blur-3xl opacity-40 pointer-events-none"></div>

        <!-- Header Sidebar (Identitas Usaha) -->
        <div class="px-8 py-8 border-b border-blue-800/80 relative z-10">
            <h2 class="text-lg font-bold tracking-tight">Persada Mandiri Farm</h2>
            <p class="text-[10px] text-sky-300 mt-1 uppercase tracking-widest font-bold">JITU SPK System</p>
        </div>

        <!-- Menu Navigasi -->
        <nav class="flex-1 overflow-y-auto px-4 py-6 space-y-1 relative z-10">
            <div class="px-4 mb-2 text-[10px] uppercase tracking-widest text-blue-400 font-bold">Menu Utama</div>
            
            <!-- Menu Berdasarkan Role Admin -->
            @if(Session::get('peran') === 'admin')
                <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl transition duration-200 {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600 text-white shadow-md' : 'text-blue-100 hover:bg-blue-800/50 hover:text-white' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    <span class="text-sm font-semibold">Dashboard Utama</span>
                </a>
                <a href="{{ route('admin.kriteria.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl transition duration-200 {{ request()->routeIs('admin.kriteria.*') ? 'bg-blue-600 text-white shadow-md' : 'text-blue-100 hover:bg-blue-800/50 hover:text-white' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                    <span class="text-sm font-semibold">Data Kriteria</span>
                </a>
                <a href="{{ route('admin.alternatif.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl transition duration-200 {{ request()->routeIs('admin.alternatif.*') ? 'bg-blue-600 text-white shadow-md' : 'text-blue-100 hover:bg-blue-800/50 hover:text-white' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    <span class="text-sm font-semibold">Data Komoditas Ikan</span>
                </a>
                <a href="{{ route('admin.spk.hitung') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl transition duration-200 {{ request()->routeIs('admin.spk.*') ? 'bg-blue-600 text-white shadow-md' : 'text-blue-100 hover:bg-blue-800/50 hover:text-white' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                    <span class="text-sm font-semibold">Hasil Keputusan SAW</span>
                </a>
            @endif

            <!-- Menu Berdasarkan Role Pegawai -->
            @if(Session::get('peran') === 'pegawai')
                <a href="{{ route('pegawai.dashboard') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl transition duration-200 {{ request()->routeIs('pegawai.dashboard') ? 'bg-blue-600 text-white shadow-md' : 'text-blue-100 hover:bg-blue-800/50 hover:text-white' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    <span class="text-sm font-semibold">Dashboard Utama</span>
                </a>
                <a href="{{ route('pegawai.penilaian.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl transition duration-200 {{ request()->routeIs('pegawai.penilaian.*') ? 'bg-blue-600 text-white shadow-md' : 'text-blue-100 hover:bg-blue-800/50 hover:text-white' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                    <span class="text-sm font-semibold">Input Penilaian Lapangan</span>
                </a>
                <a href="{{ route('pegawai.spk.hasil') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl transition duration-200 {{ request()->routeIs('pegawai.spk.*') ? 'bg-blue-600 text-white shadow-md' : 'text-blue-100 hover:bg-blue-800/50 hover:text-white' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                    <span class="text-sm font-semibold">Lihat Hasil SPK</span>
                </a>
            @endif
        </nav>

        <!-- Footer Sidebar -->
        <div class="p-6 border-t border-blue-800/80 relative z-10">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full flex items-center justify-center space-x-2 bg-blue-800 hover:bg-rose-500 text-white py-3 rounded-xl transition duration-300 font-semibold text-sm shadow-md">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    <span>Keluar Sistem</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- AREA KONTEN UTAMA (Kanan) -->
    <div class="flex-1 flex flex-col h-screen overflow-hidden bg-gradient-to-br from-slate-50 to-slate-100 relative">
        
        <!-- Aksen Top Background (Gradasi Halus) -->
        <div class="absolute top-0 left-0 w-full h-64 bg-gradient-to-b from-blue-50/50 to-transparent pointer-events-none"></div>

        <!-- TOPBAR (Navigasi Atas) -->
        <header class="h-20 bg-white/80 backdrop-blur-md border-b border-slate-200 flex items-center justify-between px-8 z-10 relative shadow-sm">
            <!-- Judul Halaman -->
            <div>
                <h1 class="text-xl font-bold text-slate-800 tracking-tight">@yield('title', 'Dashboard')</h1>
                <p class="text-xs font-medium text-slate-500 mt-0.5">Sistem Pendukung Keputusan JITU</p>
            </div>

            <!-- Profil User (Kanan Atas) -->
            <div class="flex items-center space-x-4">
                <div class="text-right hidden md:block">
                    <div class="text-sm font-bold text-slate-800">{{ Session::get('nama_lengkap') ?? 'Pengguna' }}</div>
                    <div class="text-[11px] font-bold text-blue-600 uppercase tracking-widest">{{ Session::get('peran') ?? 'Role' }}</div>
                </div>
                <div class="w-10 h-10 rounded-xl bg-blue-100 text-blue-700 flex items-center justify-center font-bold shadow-sm border border-blue-200">
                    {{ strtoupper(substr(Session::get('nama_lengkap') ?? 'U', 0, 1)) }}
                </div>
            </div>
        </header>

        <!-- KONTEN DINAMIS -->
        <main class="flex-1 overflow-y-auto p-8 relative z-10">
            
            <!-- Notifikasi Pesan Sukses -->
            @if(session('success'))
                <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-5 py-4 rounded-2xl text-sm flex items-center space-x-3 shadow-sm">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
            @endif

            <!-- Notifikasi Pesan Error -->
            @if(session('error'))
                <div class="mb-6 bg-red-50 border border-red-200 text-red-600 px-5 py-4 rounded-2xl text-sm flex items-center space-x-3 shadow-sm">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span class="font-medium">{{ session('error') }}</span>
                </div>
            @endif

            <!-- Tempat Menyisipkan Kode View Halaman Lain -->
            @yield('content')
            
            <!-- Footer Konten -->
            <div class="mt-8 pt-4 border-t border-slate-200 text-center text-xs text-slate-400 font-medium">
                Sistem Pendukung Keputusan JITU &copy; {{ date('Y') }} — Program Studi Sistem Informasi.
            </div>
        </main>
    </div>

</body>
</html>