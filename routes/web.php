<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CekKelulusanController;

// Halaman depan siswa
Route::view('/', 'welcome');

// Rute saat tombol "Cek Kelulusan" ditekan
Route::post('/cek-kelulusan', [CekKelulusanController::class, 'cek'])->name('cek.kelulusan');