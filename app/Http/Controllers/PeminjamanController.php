<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Anggota;
use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PeminjamanController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->hasRole('Siswa')) {
            $anggota = $user->anggota;

            $peminjamans = $anggota
                ? Peminjaman::with(['anggota', 'buku.kategori'])
                    ->where('anggota_id', $anggota->id)
                    ->latest()
                    ->get()
                : collect();
        } else {
            $peminjamans = Peminjaman::with(['anggota', 'buku.kategori'])
                ->latest()
                ->get();
        }

        $anggotas = Anggota::orderBy('nama')->get();
        $bukus = Buku::orderBy('judul')->get();

        return view('peminjaman.index', compact(
            'peminjamans',
            'anggotas',
            'bukus'
        ));
    }

    // Menampilkan detail peminjaman dengan pemeriksaan Policy
    public function show(Peminjaman $peminjaman)
    {
        Gate::authorize('view', $peminjaman);

        $peminjaman->load(['anggota', 'buku.kategori']);

        return view('peminjaman.show', compact('peminjaman'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'anggota_id' => ['required', 'exists:anggotas,id'],
            'buku_id' => ['required', 'exists:bukus,id'],
            'tanggal_pinjam' => ['required', 'date'],
        ]);

        Peminjaman::create([
            'anggota_id' => $request->anggota_id,
            'buku_id' => $request->buku_id,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => null,
        ]);

        return redirect()
            ->route('peminjaman.index')
            ->with('success', 'Peminjaman berhasil dicatat.');
    }

    public function pengembalian(Peminjaman $peminjaman)
    {
        if ($peminjaman->tanggal_kembali !== null) {
            return back()->with('error', 'Buku sudah dikembalikan.');
        }

        $peminjaman->update([
            'tanggal_kembali' => now()->toDateString(),
        ]);

        return back()->with('success', 'Pengembalian buku berhasil diproses.');
    }
}