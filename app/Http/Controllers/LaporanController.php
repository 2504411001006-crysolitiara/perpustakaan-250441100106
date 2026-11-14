<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Anggota;
use App\Models\Peminjaman;

class LaporanController extends Controller
{
    public function index()
    {
        $totalBuku = Buku::count();

        $totalAnggota = Anggota::count();

        $totalPeminjaman = Peminjaman::count();

        $masihDipinjam = Peminjaman::whereNull('tanggal_kembali')->count();

        $sudahDikembalikan = Peminjaman::whereNotNull('tanggal_kembali')->count();

        $peminjamans = Peminjaman::with(['anggota', 'buku'])
            ->latest()
            ->get();

        return view('laporan.index', compact(
            'totalBuku',
            'totalAnggota',
            'totalPeminjaman',
            'masihDipinjam',
            'sudahDikembalikan',
            'peminjamans'
        ));
    }
}