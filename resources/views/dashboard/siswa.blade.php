@extends('layouts.perpustakaan')

@section('title', 'Dashboard Siswa')

@section('content')
<div class="min-h-screen bg-[#FAF8F5] py-12 px-4">
    <div class="max-w-6xl mx-auto">

        {{-- Welcome Banner --}}
        <div class="relative overflow-hidden bg-[#611D20] rounded-3xl p-8 md:p-12 mb-10 shadow-lg">
            <div class="relative z-10 max-w-2xl">
                <span class="inline-block bg-white/15 text-[#F3D9A4] text-sm font-semibold px-4 py-2 rounded-full mb-5">
                    STUDENT DASHBOARD
                </span>

                <h1 class="text-3xl md:text-4xl font-bold text-white mb-4">
                    Selamat Datang,<br>
                    {{ auth()->user()->name }}!
                </h1>

                <p class="text-white/80 text-base md:text-lg leading-relaxed">
                    Senang melihatmu kembali di Perpustakaan Tiara.
                    Temukan bacaan menarik dan pantau aktivitas
                    peminjaman bukumu di sini.
                </p>

                <a href="{{ route('buku.index') }}"
                   class="inline-flex items-center gap-2 mt-7 bg-[#E8C98B] hover:bg-[#F0D9A8] text-[#611D20] font-bold px-6 py-3 rounded-xl transition duration-300">
                    Jelajahi Koleksi Buku
                    <span>→</span>
                </a>
            </div>

            <div class="absolute -right-16 -bottom-24 w-80 h-80 bg-white/5 rounded-full"></div>
            <div class="absolute right-20 -top-24 w-56 h-56 bg-white/5 rounded-full"></div>
        </div>

        {{-- Section Title --}}
        <div class="text-center mb-8">
            <p class="text-sm font-semibold tracking-widest text-[#B18A52] uppercase mb-2">
                Student Corner
            </p>
            <h2 class="text-2xl md:text-3xl font-bold text-[#611D20]">
                Menu Aktivitas
            </h2>
            <p class="text-gray-500 mt-2">
                Semua kebutuhan perpustakaanmu dalam satu tempat.
            </p>
        </div>

        {{-- Menu Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            {{-- Daftar Buku --}}
            <a href="{{ route('buku.index') }}"
               class="group bg-white border border-[#EFE7DF] rounded-2xl p-7 shadow-sm hover:shadow-xl hover:-translate-y-1 transition duration-300">
                <div class="w-14 h-14 flex items-center justify-center bg-[#F7EAEA] rounded-2xl text-2xl mb-6">
                    📚
                </div>

                <h3 class="text-xl font-bold text-[#611D20] mb-3 group-hover:text-[#9A5558] transition">
                    Daftar Buku
                </h3>

                <p class="text-gray-500 leading-relaxed text-sm">
                    Jelajahi berbagai koleksi buku dan temukan bacaan yang menarik untukmu.
                </p>

                <div class="flex items-center justify-between mt-7 text-[#9A5558] font-semibold text-sm">
                    <span>Lihat koleksi</span>
                    <span class="text-xl group-hover:translate-x-1 transition">→</span>
                </div>
            </a>

            {{-- Riwayat Peminjaman --}}
            <a href="{{ route('peminjaman.index') }}"
               class="group bg-white border border-[#EFE7DF] rounded-2xl p-7 shadow-sm hover:shadow-xl hover:-translate-y-1 transition duration-300">
                <div class="w-14 h-14 flex items-center justify-center bg-[#F8F0DF] rounded-2xl text-2xl mb-6">
                    📖
                </div>

                <h3 class="text-xl font-bold text-[#611D20] mb-3 group-hover:text-[#9A5558] transition">
                    Riwayat Peminjaman
                </h3>

                <p class="text-gray-500 leading-relaxed text-sm">
                    Pantau riwayat dan informasi buku yang pernah kamu pinjam.
                </p>

                <div class="flex items-center justify-between mt-7 text-[#9A5558] font-semibold text-sm">
                    <span>Lihat riwayat</span>
                    <span class="text-xl group-hover:translate-x-1 transition">→</span>
                </div>
            </a>

            {{-- Profil Saya --}}
            <a href="{{ route('profile.edit') }}"
               class="group bg-white border border-[#EFE7DF] rounded-2xl p-7 shadow-sm hover:shadow-xl hover:-translate-y-1 transition duration-300">
                <div class="w-14 h-14 flex items-center justify-center bg-[#EAEFF7] rounded-2xl text-2xl mb-6">
                    👤
                </div>

                <h3 class="text-xl font-bold text-[#611D20] mb-3 group-hover:text-[#9A5558] transition">
                    Profil Saya
                </h3>

                <p class="text-gray-500 leading-relaxed text-sm">
                    Periksa dan perbarui informasi pribadi serta pengaturan akunmu.
                </p>

                <div class="flex items-center justify-between mt-7 text-[#9A5558] font-semibold text-sm">
                    <span>Kelola profil</span>
                    <span class="text-xl group-hover:translate-x-1 transition">→</span>
                </div>
            </a>

        </div>

        {{-- Bottom Note --}}
        <div class="mt-10 text-center bg-white border border-[#EFE7DF] rounded-2xl p-6">
            <p class="text-[#611D20] font-semibold">
                “A book is a gift you can open again and again.”
            </p>
            <p class="text-gray-400 text-sm mt-2">
                Selamat membaca dan menambah wawasan!
            </p>
        </div>

    </div>
</div>
@endsection