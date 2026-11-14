@extends('layouts.perpustakaan')

@section('title', 'Dashboard Petugas')

@section('content')
<div class="min-h-screen bg-[#FAF8F5] py-12 px-4">
    <div class="max-w-6xl mx-auto">

        {{-- Welcome Banner --}}
        <div class="relative overflow-hidden bg-[#611D20] rounded-3xl p-8 md:p-12 mb-10 shadow-lg">
            <div class="relative z-10 max-w-2xl">
                <span class="inline-block bg-white/15 text-[#F3D9A4] text-sm font-semibold px-4 py-2 rounded-full mb-5">
                    LIBRARY STAFF DASHBOARD
                </span>

                <h1 class="text-3xl md:text-4xl font-bold text-white mb-4">
                    Selamat Datang,<br>
                    {{ auth()->user()->name }}!
                </h1>

                <p class="text-white/80 text-base md:text-lg leading-relaxed">
                    Kelola kegiatan operasional Perpustakaan Tiara
                    dengan lebih mudah. Pastikan seluruh aktivitas
                    buku, peminjaman, dan pengembalian berjalan dengan baik.
                </p>

                <a href="{{ route('peminjaman.index') }}"
                   class="inline-flex items-center gap-2 mt-7 bg-[#E8C98B] hover:bg-[#F0D9A8] text-[#611D20] font-bold px-6 py-3 rounded-xl transition duration-300">
                    Kelola Peminjaman
                    <span>→</span>
                </a>
            </div>

            <div class="absolute -right-16 -bottom-24 w-80 h-80 bg-white/5 rounded-full"></div>
            <div class="absolute right-20 -top-24 w-56 h-56 bg-white/5 rounded-full"></div>
        </div>

        {{-- Section Title --}}
        <div class="text-center mb-8">
            <p class="text-sm font-semibold tracking-widest text-[#B18A52] uppercase mb-2">
                Staff Workspace
            </p>

            <h2 class="text-2xl md:text-3xl font-bold text-[#611D20]">
                Menu Operasional
            </h2>

            <p class="text-gray-500 mt-2">
                Pilih layanan yang ingin kamu kelola hari ini.
            </p>
        </div>

        {{-- Menu Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            {{-- Kelola Buku --}}
            <a href="{{ route('buku.index') }}"
               class="group bg-white border border-[#EFE7DF] rounded-2xl p-7 shadow-sm hover:shadow-xl hover:-translate-y-1 transition duration-300">

                <div class="w-14 h-14 flex items-center justify-center bg-[#F7EAEA] rounded-2xl text-2xl mb-6">
                    📚
                </div>

                <h3 class="text-xl font-bold text-[#611D20] mb-3 group-hover:text-[#9A5558] transition">
                    Kelola Buku
                </h3>

                <p class="text-gray-500 leading-relaxed text-sm">
                    Mengelola koleksi dan informasi data buku yang tersedia di perpustakaan.
                </p>

                <div class="flex items-center justify-between mt-7 text-[#9A5558] font-semibold text-sm">
                    <span>Buka data buku</span>
                    <span class="text-xl group-hover:translate-x-1 transition">→</span>
                </div>
            </a>

            {{-- Peminjaman --}}
            <a href="{{ route('peminjaman.index') }}"
               class="group bg-white border border-[#EFE7DF] rounded-2xl p-7 shadow-sm hover:shadow-xl hover:-translate-y-1 transition duration-300">

                <div class="w-14 h-14 flex items-center justify-center bg-[#F8F0DF] rounded-2xl text-2xl mb-6">
                    📝
                </div>

                <h3 class="text-xl font-bold text-[#611D20] mb-3 group-hover:text-[#9A5558] transition">
                    Peminjaman
                </h3>

                <p class="text-gray-500 leading-relaxed text-sm">
                    Mencatat dan mengelola transaksi peminjaman buku oleh anggota perpustakaan.
                </p>

                <div class="flex items-center justify-between mt-7 text-[#9A5558] font-semibold text-sm">
                    <span>Kelola peminjaman</span>
                    <span class="text-xl group-hover:translate-x-1 transition">→</span>
                </div>
            </a>

            {{-- Pengembalian --}}
            <a href="{{ route('peminjaman.index') }}"
               class="group bg-white border border-[#EFE7DF] rounded-2xl p-7 shadow-sm hover:shadow-xl hover:-translate-y-1 transition duration-300">

                <div class="w-14 h-14 flex items-center justify-center bg-[#EAEFF7] rounded-2xl text-2xl mb-6">
                    📦
                </div>

                <h3 class="text-xl font-bold text-[#611D20] mb-3 group-hover:text-[#9A5558] transition">
                    Pengembalian
                </h3>

                <p class="text-gray-500 leading-relaxed text-sm">
                    Memproses pengembalian buku dan memperbarui status transaksi peminjaman.
                </p>

                <div class="flex items-center justify-between mt-7 text-[#9A5558] font-semibold text-sm">
                    <span>Proses pengembalian</span>
                    <span class="text-xl group-hover:translate-x-1 transition">→</span>
                </div>
            </a>

            {{-- Laporan --}}
            <a href="{{ route('laporan.index') }}"
               class="group bg-white border border-[#EFE7DF] rounded-2xl p-7 shadow-sm hover:shadow-xl hover:-translate-y-1 transition duration-300">

                <div class="w-14 h-14 flex items-center justify-center bg-[#F2EAF5] rounded-2xl text-2xl mb-6">
                    📊
                </div>

                <h3 class="text-xl font-bold text-[#611D20] mb-3 group-hover:text-[#9A5558] transition">
                    Laporan
                </h3>

                <p class="text-gray-500 leading-relaxed text-sm">
                    Melihat ringkasan data dan riwayat aktivitas operasional perpustakaan.
                </p>

                <div class="flex items-center justify-between mt-7 text-[#9A5558] font-semibold text-sm">
                    <span>Lihat laporan</span>
                    <span class="text-xl group-hover:translate-x-1 transition">→</span>
                </div>
            </a>

        </div>

        {{-- Bottom Note --}}
        <div class="mt-10 text-center bg-white border border-[#EFE7DF] rounded-2xl p-6">
            <p class="text-[#611D20] font-semibold">
                Good service makes a great library.
            </p>

            <p class="text-gray-400 text-sm mt-2">
                Terima kasih telah menjadi bagian dari Perpustakaan Tiara.
            </p>
        </div>

    </div>
</div>
@endsection