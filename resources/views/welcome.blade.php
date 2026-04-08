<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengumuman Kelulusan SMKN 2 Jakarta</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Efek kaca (Glassmorphism) */
        .glass-panel {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.15);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-900 via-indigo-950 to-slate-900 min-h-screen font-sans text-gray-100 flex items-center justify-center p-4">

    <div class="glass-panel max-w-2xl w-full rounded-3xl shadow-2xl overflow-hidden p-6 md:p-10 transition-all duration-500 hover:shadow-indigo-500/20">
        
        <div class="text-center mb-8">
            
            <div class="flex justify-center mb-5">
                <img src="{{ asset('Logo-SMKN-2-JKT.png') }}" 
     alt="Logo SMKN 2 Jakarta" 
     class="w-20 md:w-24 h-auto drop-shadow-lg transition-transform hover:scale-105">
</div>
            <h1 class="text-2xl md:text-3xl font-extrabold tracking-tight text-white mb-1 drop-shadow-md">PENGUMUMAN KELULUSAN</h1>
            <h2 class="text-lg md:text-xl font-bold text-indigo-300">SMK Negeri 2 Jakarta</h2>
            <p class="text-xs md:text-sm text-gray-400 mt-1">Jl. Batu No.3, Kec. Gambir, Kota Jakarta Pusat</p>
            <p class="text-sm text-gray-400 mt-2">Tahun Pelajaran 2025/2026</p>
            <div class="h-1 w-20 bg-indigo-500 mx-auto mt-4 rounded-full"></div>
        </div>

        <div class="space-y-6 text-sm md:text-base text-gray-200 leading-relaxed">
            <p class="text-center mb-4 text-xs text-gray-400">Nomor: 000/SMKN2-JKT/2026</p>
            
            <div class="bg-rose-500/10 border border-rose-500/20 rounded-xl p-5">
                <h3 class="font-bold text-rose-400 mb-3 flex items-center gap-2">
                    Tata Tertib pengumuman Kelulusan
                </h3>
                <ul class="space-y-3 ml-5 list-decimal marker:text-rose-400 text-justify">
                    <li><strong class="text-rose-300">Dilarang Keras</strong> melakukan aksi coret-coret seragam atau fasilitas umum.</li>
                    <li><strong class="text-rose-300">Dilarang Keras</strong> melakukan konvoi kendaraan di jalan raya.</li>
                    <li><strong class="text-rose-300">Dilarang Keras</strong> Siswa dilarang berkumpul atau berkerumun dalam kelompok besar.</li>
                    <li><strong class="text-rose-300">Dilarang Keras</strong> Siswa dilarang datang ke sekolah atau berada di sekitar lingkungan sekolah saat pengumuman berlangsung.</li>
                </ul>
            </div>
        </div>

        <div class="mt-8 pt-8 border-t border-white/10 flex flex-col-reverse md:flex-row items-center justify-between gap-8 md:gap-4">
            
            <div class="w-full md:w-1/2">
                @if(session('error'))
                    <div class="bg-rose-500/20 border border-rose-500 text-rose-300 px-4 py-2 rounded-xl mb-3 text-sm">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('cek.kelulusan') }}" method="POST" class="space-y-3">
                    @csrf
                    <input type="text" name="nisn" required placeholder="Masukkan NISN Anda..." class="w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-all">
                    <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-500 text-white font-bold py-3 px-4 rounded-xl shadow-lg shadow-indigo-500/30 transition-all transform hover:scale-[1.02] active:scale-95">
                        Cek Kelulusan
                    </button>
                </form>
            </div>
            
            <div class="w-full md:w-1/2 text-center md:text-right">
                <p class="text-sm text-gray-400 mb-8">Jakarta, 6 Mei 2026</p>
                <p class="text-sm font-medium text-white">Kepala SMK Negeri 2 Jakarta</p>
                <div class="h-16"></div> <p class="text-sm font-bold underline decoration-indigo-500 underline-offset-4">[Nama Kepala Sekolah]</p>
            </div>
            
        </div>

    </div>

</body>
</html>