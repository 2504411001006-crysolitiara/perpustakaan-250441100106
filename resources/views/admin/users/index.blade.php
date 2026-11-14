@extends('layouts.perpustakaan')

@section('title', 'Kelola Pengguna')

@section('content')
<div class="max-w-6xl mx-auto py-8 px-4">

    <h1 class="text-3xl font-bold text-[#611D20] mb-2">
        Kelola Pengguna
    </h1>

    <p class="text-gray-600 mb-8">
        Kelola akun dan hak akses pengguna perpustakaan.
    </p>

    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-5">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-5">
            {{ session('error') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-5">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <div class="bg-white rounded-xl shadow overflow-hidden">

        <div class="p-6 border-b">
            <h2 class="text-xl font-bold text-[#611D20]">
                Daftar Pengguna
            </h2>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left">

                <thead>
                    <tr class="bg-[#611D20] text-white">
                        <th class="p-4">No</th>
                        <th class="p-4">Nama</th>
                        <th class="p-4">Email</th>
                        <th class="p-4">Role</th>
                        <th class="p-4">Ubah Role</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($users as $user)
                        <tr class="border-b hover:bg-gray-50">

                            <td class="p-4">
                                {{ $users->firstItem() + $loop->index }}
                            </td>

                            <td class="p-4">{{ $user->name }}</td>

                            <td class="p-4">{{ $user->email }}</td>

                            <td class="p-4">
                                @forelse ($user->roles as $role)
                                    <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm">
                                        {{ $role->name }}
                                    </span>
                                @empty
                                    <span class="text-red-500">Belum memiliki role</span>
                                @endforelse
                            </td>

                            <td class="p-4">
                                @if ($user->id !== auth()->id())
                                    <form action="{{ route('admin.users.updateRole', $user->id) }}"
                                          method="POST"
                                          class="flex flex-wrap gap-2">

                                        @csrf
                                        @method('PATCH')

                                        <select name="role" class="border rounded-lg px-3 py-2">
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->name }}"
                                                    @selected($user->hasRole($role->name))>
                                                    {{ $role->name }}
                                                </option>
                                            @endforeach
                                        </select>

                                        <button type="submit"
                                            class="bg-[#611D20] text-white px-4 py-2 rounded-lg">
                                            Simpan
                                        </button>

                                    </form>
                                @else
                                    <span class="text-gray-500 text-sm">Akun Anda</span>
                                @endif
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-5 text-center text-gray-500">
                                Belum ada pengguna terdaftar.
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

        <div class="p-5">
            {{ $users->links() }}
        </div>

    </div>

    <a href="{{ route('admin.dashboard') }}"
       class="inline-block mt-6 bg-gray-200 text-gray-700 px-5 py-2 rounded-lg">
        Kembali ke Dashboard
    </a>

</div>
@endsection