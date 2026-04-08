<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Kelulusan - {{ $siswa->nama }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-slate-900 via-indigo-950 to-slate-900 min-h-screen font-sans text-gray-100 flex items-center justify-center p-4">

    <div class="bg-white/10 backdrop-blur-md border border-white/20 max-w-lg w-full rounded-3xl shadow-2xl overflow-hidden p-8 text-center">
        
        <h2 class="text-xl text-gray-300 mb-2">Hasil Pengumuman kelulusan</h2>
        <h1 class="text-3xl font-bold text-white mb-6">{{ $siswa->nama }}</h1>
        <p class="text-gray-400 mb-8">NISN: {{ $siswa->nisn }}</p>

        @if($siswa->status == 'LULUS')
            <div class="bg-emerald-500/20 border-2 border-emerald-500 rounded-2xl p-6 mb-8">
                <h2 class="text-4xl font-black text-emerald-400 tracking-widest mb-2">LULUS</h2>
                <p class="text-emerald-200 text-sm">Selamat! Perjuanganmu membuahkan hasil. Sukses untuk masa depanmu!</p>
            </div>
        @elseif($siswa->status == 'TIDAK LULUS')
            <div class="bg-rose-500/20 border-2 border-rose-500 rounded-2xl p-6 mb-8">
                <h2 class="text-4xl font-black text-rose-400 tracking-widest mb-2">TIDAK LULUS</h2>
                <p class="text-rose-200 text-sm">Jangan patah semangat. Ini bukan akhir dari segalanya, teruslah berusaha!</p>
            </div>
        @else
            <div class="bg-amber-500/20 border-2 border-amber-500 rounded-2xl p-6 mb-8">
                <h2 class="text-3xl font-black text-amber-400 tracking-widest mb-2">DITUNDA</h2>
                <p class="text-amber-200 text-sm">Silakan hubungi pihak sekolah/tata usaha untuk informasi lebih lanjut.</p>
            </div>
        @endif

        <a href="/" class="inline-block bg-gray-700 hover:bg-gray-600 text-white font-semibold py-2 px-6 rounded-lg transition-colors">
            Kembali
        </a>

    </div>

</body>
</html>