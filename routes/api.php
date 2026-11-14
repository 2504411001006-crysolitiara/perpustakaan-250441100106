<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiBukuController;

// ==========================================
// API BUKU - DAPAT DIAKSES SEMUA PENGGUNA
// ==========================================

Route::get('/buku', [ApiBukuController::class, 'index']);

Route::get('/buku/{id}', [ApiBukuController::class, 'show']);


// ==========================================
// API KHUSUS ADMIN DAN PETUGAS
// MENGGUNAKAN GATE kelola-buku
// ==========================================

Route::middleware(['auth:sanctum', 'can:kelola-buku'])->group(function () {

    // Tambah buku
    Route::post('/buku', [ApiBukuController::class, 'store']);

    // Edit buku
    Route::put('/buku/{id}', [ApiBukuController::class, 'update']);

    Route::patch('/buku/{id}', [ApiBukuController::class, 'update']);

    // Hapus buku
    Route::delete('/buku/{id}', [ApiBukuController::class, 'destroy']);

    // Laporan perpustakaan
    Route::get('/rekap/buku-per-kategori', [
        ApiBukuController::class,
        'rekapBukuPerKategori'
    ]);

    Route::get('/rekap/peminjaman-per-buku', [
        ApiBukuController::class,
        'rekapPeminjamanPerBuku'
    ]);

});