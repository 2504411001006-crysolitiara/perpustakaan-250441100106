@extends('layouts.perpustakaan')

@section('title', 'Laporan Perpustakaan')

@section('content')
<div class="max-w-6xl mx-auto py-8 px-4">

    <h1 class="text-3xl font-bold text-[#611D20] mb-2">
        Laporan Perpustakaan
    </h1>

    <p class="text-gray-600 mb-8">
        Ringkasan data dan aktivitas perpustakaan.
    </p>

    {{-- Ringkasan Data --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">

        <div class="bg-white p-6 rounded-xl shadow">
            <p class="text-gray-500">Total Buku</p>
            <h2 class="text-3xl font-bold text-[#611D20] mt-2">
                {{ $totalBuku }}
            </h2>
        </div>

        <div class="bg-white p-6 rounded-xl shadow">
            <p class="text-gray-500">Total Anggota</p>
            <h2 class="text-3xl font-bold text-[#611D20] mt-2">
                {{ $totalAnggota }}
            </h2>
        </div>

        <div class="bg-white p-6 rounded-xl shadow">
            <p class="text-gray-500">Total Peminjaman</p>
            <h2 class="text-3xl font-bold text-[#611D20] mt-2">
                {{ $totalPeminjaman }}
            </h2>
        </div>

        <div class="bg-white p-6 rounded-xl shadow">
            <p class="text-gray-500">Masih Dipinjam</p>
            <h2 class="text-3xl font-bold text-orange-600 mt-2">
                {{ $masihDipinjam }}
            </h2>
        </div>

        <div class="bg-white p-6 rounded-xl shadow">
            <p class="text-gray-500">Sudah Dikembalikan</p>
            <h2 class="text-3xl font-bold text-green-600 mt-2">
                {{ $sudahDikembalikan }}
            </h2>
        </div>

    </div>

    {{-- Tabel Riwayat --}}
    <div class="bg-white rounded-xl shadow p-6">

        <h2 class="text-xl font-bold text-[#611D20] mb-5">
            Riwayat Peminjaman
        </h2>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">

                <thead>
                    <tr class="bg-[#611D20] text-white">
                        <th class="p-3">No</th>
                        <th class="p-3">Nama Anggota</th>
                        <th class="p-3">Judul Buku</th>
                        <th class="p-3">Tanggal Pinjam</th>
                        <th class="p-3">Tanggal Kembali</th>
                        <th class="p-3">Status</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($peminjamans as $peminjaman)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-3">{{ $loop->iteration }}</td>

                        <td class="p-3">
                            {{ $peminjaman->anggota->nama ?? '-' }}
                        </td>

                        <td class="p-3">
                            {{ $peminjaman->buku->judul ?? '-' }}
                        </td>

                        <td class="p-3">
                            {{ $peminjaman->tanggal_pinjam }}
                        </td>

                        <td class="p-3">
                            {{ $peminjaman->tanggal_kembali ?? '-' }}
                        </td>

                        <td class="p-3">
                            @if ($peminjaman->tanggal_kembali)
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
                                    Dikembalikan
                                </span>
                            @else
                                <span class="bg-orange-100 text-orange-700 px-3 py-1 rounded-full text-sm">
                                    Dipinjam
                                </span>
                            @endif
                        </td>
                    </tr>

                    @empty
                    <tr>
                        <td colspan="6" class="p-5 text-center text-gray-500">
                            Belum ada data peminjaman.
                        </td>
                    </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

        <div class="mt-6">
            <button onclick="window.print()"
                class="bg-[#611D20] text-white px-5 py-2 rounded-lg hover:bg-[#7b292d]">
                Cetak Laporan
            </button>
        </div>

    </div>
</div>
@endsection