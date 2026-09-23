<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk Sistem - JITU SPK | Persada Mandiri Farm</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-sky-100 via-blue-50 to-indigo-100 text-slate-900 min-h-screen flex items-center justify-center p-4">

    <!-- Wrapper Utama Split Layout yang Elegan -->
    <div class="w-full max-w-4xl bg-white rounded-3xl shadow-2xl border border-slate-100 overflow-hidden grid grid-cols-1 md:grid-cols-12">
        
        <!-- Sisi Kiri: Branding & Identitas Usaha (Warna Biru Korporat) -->
        <div class="md:col-span-5 bg-blue-900 text-white p-8 md:p-12 flex flex-col justify-between relative overflow-hidden">
            <!-- Aksen Dekoratif Halus -->
            <div class="absolute -right-16 -bottom-16 w-64 h-64 bg-blue-800 rounded-full blur-2xl opacity-50 pointer-events-none"></div>

            <div class="relative z-10 space-y-2">
                <h2 class="text-xl font-bold tracking-tight">Persada Mandiri Farm</h2>
                <p class="text-xs text-sky-200 mt-1 uppercase tracking-wider font-semibold">Budidaya & Pengembangan Ikan Tawar</p>
            </div>

            <div class="relative z-10 space-y-2 mt-8 md:mt-0">
                <h1 class="text-2xl font-bold tracking-tight">JITU SPK</h1>
                <p class="text-xs text-slate-300 leading-relaxed">Sistem Pendukung Keputusan Berbasis Metode SAW untuk Optimalisasi Komoditas Ikan Unggulan.</p>
            </div>

            <div class="relative z-10 pt-6 border-t border-blue-800/80 text-[11px] text-sky-300">
                &copy; 2026 — Karawang, Jawa Barat
            </div>
        </div>

        <!-- Sisi Kanan: Form Login Bersih & Minimalis -->
        <div class="md:col-span-7 p-8 md:p-12 flex flex-col justify-center bg-white">
            <div class="mb-8">
                <h3 class="text-xl font-bold text-slate-800">Masuk ke Dashboard</h3>
                <p class="text-xs text-slate-500 mt-1">Silakan masukkan kredensial akun Anda dengan benar.</p>
            </div>

            <!-- Pesan Error Validasi -->
            @if($errors->any())
                <div class="mb-6 bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-xl text-xs flex items-center space-x-2">
                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                    <span>{{ $errors->first() }}</span>
                </div>
            @endif

            <!-- Form Autentikasi -->
            <form action="{{ route('login.proses') }}" method="POST" class="space-y-5">
                @csrf
                <div>
                    <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Username</label>
                    <input type="text" name="username" value="{{ old('username') }}" required autofocus
                        class="w-full bg-slate-50 border border-slate-200 focus:border-blue-600 focus:bg-white focus:ring-2 focus:ring-blue-100 rounded-xl px-4 py-3 text-sm text-slate-800 placeholder-slate-400 outline-none transition duration-200"
                        placeholder="Masukkan username...">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Password</label>
                    <input type="password" name="password" required
                        class="w-full bg-slate-50 border border-slate-200 focus:border-blue-600 focus:bg-white focus:ring-2 focus:ring-blue-100 rounded-xl px-4 py-3 text-sm text-slate-800 placeholder-slate-400 outline-none transition duration-200"
                        placeholder="••••••••••••">
                </div>

                <button type="submit" 
                    class="w-full bg-blue-600 hover:bg-blue-700 active:bg-blue-800 text-white font-semibold py-3.5 rounded-xl transition duration-200 shadow-lg shadow-blue-600/20 text-sm mt-2">
                    Masuk Sistem
                </button>
            </form>
        </div>

    </div>

</body>
</html>