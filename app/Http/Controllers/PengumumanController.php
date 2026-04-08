<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa; 

class PengumumanController extends Controller
{
    public function cek(Request $request)
    {
        $request->validate([
            'nisn' => 'required',
        ]);

       
        $siswa = Siswa::where('nisn', $request->nisn)->first();

        if ($siswa) {
            return view('hasil', compact('siswa'));
        }

        return back()->with('error', 'Data tidak ditemukan. Pastikan NISN benar.');
    }
}