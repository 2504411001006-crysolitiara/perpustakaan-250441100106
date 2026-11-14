@extends('layouts.perpustakaan')

@section('content')

<div class="min-h-screen bg-gray-50 py-10 px-4">
    <div class="max-w-4xl mx-auto">

        {{-- Header --}}
        <div class="mb-8">
            <p class="text-sm text-gray-500 mb-2">
                Perpustakaan Tiara / Profil
            </p>

            <h1 class="text-3xl font-bold text-[#611D20]">
                Profil Saya
            </h1>

            <p class="text-gray-600 mt-2">
                Kelola informasi akun dan keamanan akun Anda.
            </p>
        </div>

        {{-- Informasi Akun --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 mb-6">

            <div class="flex items-center gap-4">

                <div class="w-16 h-16 rounded-full bg-[#611D20] text-white
                            flex items-center justify-center text-2xl font-bold">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>

                <div>
                    <h2 class="text-xl font-bold text-gray-800">
                        {{ auth()->user()->name }}
                    </h2>

                    <p class="text-gray-500">
                        {{ auth()->user()->email }}
                    </p>

                    <span class="inline-block mt-2 px-3 py-1 rounded-full
                                 bg-pink-100 text-[#611D20] text-xs font-semibold">
                        {{ auth()->user()->getRoleNames()->first() ?? 'Pengguna' }}
                    </span>
                </div>

            </div>

        </div>

        {{-- Informasi Profil --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 mb-6">

            <h2 class="text-xl font-bold text-[#611D20] mb-2">
                Informasi Profil
            </h2>

            <p class="text-sm text-gray-500 mb-6">
                Perbarui nama dan alamat email akun Anda.
            </p>

            @include('profile.partials.update-profile-information-form')

        </div>

        {{-- Keamanan Akun --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">

            <h2 class="text-xl font-bold text-[#611D20] mb-2">
                Keamanan Akun
            </h2>

            <p class="text-sm text-gray-500 mb-6">
                Gunakan password yang aman untuk melindungi akun Anda.
            </p>

            @include('profile.partials.update-password-form')

        </div>

    </div>
</div>

@endsection