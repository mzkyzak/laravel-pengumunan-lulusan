<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa; // Memanggil model database Siswa

class CekKelulusanController extends Controller
{
    public function cek(Request $request)
    {
        // Validasi inputan harus diisi
        $request->validate([
            'nisn' => 'required'
        ]);

        // Mencari siswa berdasarkan NISN yang diketik
        $siswa = Siswa::where('nisn', $request->nisn)->first();

        // Jika data ketemu, bawa ke halaman hasil
        if ($siswa) {
            return view('hasil', compact('siswa'));
        } 
        
        // Jika tidak ketemu, kembalikan ke halaman depan bawa pesan error
        return back()->with('error', 'Data dengan NISN tersebut tidak ditemukan. Pastikan NISN benar.');
    }
}