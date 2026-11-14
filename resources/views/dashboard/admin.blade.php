@extends('layouts.perpustakaan')

@section('title', 'Dashboard Admin')

@section('content')
<div class="min-h-screen bg-[#F8F6F2]">

    <div class="max-w-7xl mx-auto px-6 lg:px-12 py-12">

        {{-- HEADER --}}
        <div class="flex flex-col sm:flex-row justify-between items-center gap-6 mb-12">

            <div class="text-center sm:text-left">
                <p class="text-xs tracking-[0.3em] uppercase text-[#A17A50] font-bold mb-3">
                    Perpustakaan Tiara
                </p>

                <h1 class="text-3xl md:text-4xl font-serif font-bold text-[#611D20]">
                    Dashboard Admin
                </h1>

                <p class="text-gray-500 mt-3">
                    Selamat datang kembali, {{ auth()->user()->name }}.
                </p>
            </div>

            <div class="flex items-center gap-4 bg-white px-5 py-4 rounded-2xl border border-[#EDE5DA] shadow-sm">
                <div class="w-12 h-12 rounded-full bg-[#611D20] text-white flex items-center justify-center text-xl font-bold">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>

                <div>
                    <p class="font-bold text-[#421719]">
                        {{ auth()->user()->name }}
                    </p>
                    <p class="text-xs text-[#A17A50] uppercase tracking-wider">
                        Administrator
                    </p>
                </div>
            </div>

        </div>


        {{-- WELCOME BANNER --}}
        <div class="relative bg-[#611D20] rounded-[28px] overflow-hidden mb-16">

            <div class="absolute -right-16 -top-20 w-72 h-72 border border-white/10 rounded-full"></div>
            <div class="absolute -right-5 -bottom-36 w-80 h-80 border border-white/10 rounded-full"></div>

            <div class="relative z-10 px-8 md:px-14 py-12 md:py-16 max-w-3xl">

                <p class="text-[#E5C69B] text-xs uppercase tracking-[0.3em] mb-5">
                    Administration Workspace
                </p>

                <h2 class="text-white text-3xl md:text-4xl font-serif font-bold leading-snug">
                    Mengelola Pengetahuan,<br>
                    Membangun Kemudahan.
                </h2>

                <p class="text-white/70 mt-5 leading-relaxed max-w-xl">
                    Kelola koleksi buku, pengguna, aktivitas peminjaman,
                    dan laporan perpustakaan melalui satu ruang administrasi.
                </p>

                <a href="{{ route('laporan.index') }}"
                   class="inline-flex items-center gap-3 mt-8 px-7 py-3.5 bg-[#E5C69B] text-[#421719] rounded-xl font-semibold text-sm hover:bg-white transition">
                    Lihat Laporan
                    <span>→</span>
                </a>

            </div>
        </div>


        {{-- SECTION TITLE --}}
        <div class="text-center mb-10">

            <p class="text-xs uppercase tracking-[0.3em] text-[#A17A50] font-bold mb-3">
                Management Center
            </p>

            <h2 class="text-3xl font-serif font-bold text-[#611D20]">
                Pusat Administrasi
            </h2>

            <div class="w-16 h-1 bg-[#C5A477] mx-auto mt-5 rounded-full"></div>

            <p class="text-gray-500 mt-5 max-w-xl mx-auto leading-relaxed">
                Pilih salah satu layanan berikut untuk mengelola
                berbagai aktivitas Perpustakaan Tiara.
            </p>

        </div>


        {{-- MENU CARDS --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-7 max-w-5xl mx-auto">

            {{-- BUKU --}}
            <a href="{{ route('buku.index') }}"
               class="group bg-white rounded-3xl p-8 border border-[#EDE5DA] shadow-sm hover:shadow-xl hover:-translate-y-1 transition duration-300">

                <div class="flex items-center justify-between mb-7">

                    <div class="w-16 h-16 rounded-2xl bg-[#F5E9E5] flex items-center justify-center text-3xl">
                        📚
                    </div>

                    <span class="text-2xl text-[#B89A73] group-hover:translate-x-1 transition">
                        ↗
                    </span>

                </div>

                <h3 class="text-xl font-bold text-[#611D20] mb-3">
                    Kelola Buku
                </h3>

                <p class="text-gray-500 text-sm leading-7">
                    Mengatur koleksi buku, menambahkan data baru,
                    memperbarui informasi, dan menghapus koleksi.
                </p>

                <div class="mt-7 pt-5 border-t border-[#F0EBE5]">
                    <span class="text-sm font-bold text-[#A17A50]">
                        Buka Manajemen Buku →
                    </span>
                </div>

            </a>


            {{-- PENGGUNA --}}
            <a href="{{ route('admin.users.index') }}"
               class="group bg-white rounded-3xl p-8 border border-[#EDE5DA] shadow-sm hover:shadow-xl hover:-translate-y-1 transition duration-300">

                <div class="flex items-center justify-between mb-7">

                    <div class="w-16 h-16 rounded-2xl bg-[#F4EFE5] flex items-center justify-center text-3xl">
                        👥
                    </div>

                    <span class="text-2xl text-[#B89A73] group-hover:translate-x-1 transition">
                        ↗
                    </span>

                </div>

                <h3 class="text-xl font-bold text-[#611D20] mb-3">
                    Kelola Pengguna
                </h3>

                <p class="text-gray-500 text-sm leading-7">
                    Melihat daftar akun pengguna serta mengatur
                    hak akses dan role Admin, Petugas, maupun Siswa.
                </p>

                <div class="mt-7 pt-5 border-t border-[#F0EBE5]">
                    <span class="text-sm font-bold text-[#A17A50]">
                        Buka Manajemen Pengguna →
                    </span>
                </div>

            </a>


            {{-- PEMINJAMAN --}}
            <a href="{{ route('peminjaman.index') }}"
               class="group bg-white rounded-3xl p-8 border border-[#EDE5DA] shadow-sm hover:shadow-xl hover:-translate-y-1 transition duration-300">

                <div class="flex items-center justify-between mb-7">

                    <div class="w-16 h-16 rounded-2xl bg-[#EAF0EB] flex items-center justify-center text-3xl">
                        📖
                    </div>

                    <span class="text-2xl text-[#B89A73] group-hover:translate-x-1 transition">
                        ↗
                    </span>

                </div>

                <h3 class="text-xl font-bold text-[#611D20] mb-3">
                    Peminjaman & Pengembalian
                </h3>

                <p class="text-gray-500 text-sm leading-7">
                    Mengelola transaksi peminjaman, mencatat buku
                    yang dipinjam, serta memproses pengembaliannya.
                </p>

                <div class="mt-7 pt-5 border-t border-[#F0EBE5]">
                    <span class="text-sm font-bold text-[#A17A50]">
                        Buka Data Peminjaman →
                    </span>
                </div>

            </a>


            {{-- LAPORAN --}}
            <a href="{{ route('laporan.index') }}"
               class="group bg-white rounded-3xl p-8 border border-[#EDE5DA] shadow-sm hover:shadow-xl hover:-translate-y-1 transition duration-300">

                <div class="flex items-center justify-between mb-7">

                    <div class="w-16 h-16 rounded-2xl bg-[#EDEAF3] flex items-center justify-center text-3xl">
                        📊
                    </div>

                    <span class="text-2xl text-[#B89A73] group-hover:translate-x-1 transition">
                        ↗
                    </span>

                </div>

                <h3 class="text-xl font-bold text-[#611D20] mb-3">
                    Laporan Perpustakaan
                </h3>

                <p class="text-gray-500 text-sm leading-7">
                    Melihat ringkasan koleksi buku, anggota,
                    transaksi peminjaman, dan pengembalian.
                </p>

                <div class="mt-7 pt-5 border-t border-[#F0EBE5]">
                    <span class="text-sm font-bold text-[#A17A50]">
                        Buka Laporan →
                    </span>
                </div>

            </a>

        </div>


        {{-- FOOTER --}}
        <div class="mt-16 pt-8 border-t border-[#E7DED3] text-center">

            <h3 class="font-serif text-xl font-bold text-[#611D20]">
                Perpustakaan Tiara
            </h3>

            <p class="text-gray-400 text-xs tracking-wider mt-3">
                A PLACE WHERE KNOWLEDGE GROWS
            </p>

            <p class="text-gray-400 text-xs mt-5">
                Administration Dashboard · 2026
            </p>

        </div>

    </div>
</div>
@endsection