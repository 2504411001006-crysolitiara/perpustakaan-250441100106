@extends('layouts.perpustakaan')

@section('title', 'Data Peminjaman')

@section('content')

<div class="container">

    <h2>Data Peminjaman Buku</h2>
    <p>Kelola data peminjaman dan pengembalian buku perpustakaan.</p>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if(session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif

    @if($errors->any())
        <div style="color: red;">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    @role('Admin|Petugas')

        <h3>Tambah Peminjaman</h3>

        <form action="{{ route('peminjaman.store') }}" method="POST">
            @csrf

            <div style="margin-bottom: 15px;">
                <label>Anggota</label><br>

                <select name="anggota_id" required>
                    <option value="">Pilih Anggota</option>

                    @foreach($anggotas as $anggota)
                        <option value="{{ $anggota->id }}"
                            {{ old('anggota_id') == $anggota->id ? 'selected' : '' }}>
                            {{ $anggota->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div style="margin-bottom: 15px;">
                <label>Buku</label><br>

                <select name="buku_id" required>
                    <option value="">Pilih Buku</option>

                    @foreach($bukus as $buku)
                        <option value="{{ $buku->id }}"
                            {{ old('buku_id') == $buku->id ? 'selected' : '' }}>
                            {{ $buku->judul }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div style="margin-bottom: 15px;">
                <label>Tanggal Pinjam</label><br>

                <input
                    type="date"
                    name="tanggal_pinjam"
                    value="{{ old('tanggal_pinjam', date('Y-m-d')) }}"
                    required
                >
            </div>

            <button type="submit">Simpan Peminjaman</button>
        </form>

        <hr>

    @endrole

    <h3>Daftar Peminjaman</h3>

    <div style="overflow-x: auto;">
        <table style="width: 100%; border-collapse: collapse;">

            <thead>
                <tr>
                    <th style="border: 1px solid #ddd; padding: 10px;">ID</th>
                    <th style="border: 1px solid #ddd; padding: 10px;">Nama Anggota</th>
                    <th style="border: 1px solid #ddd; padding: 10px;">Judul Buku</th>
                    <th style="border: 1px solid #ddd; padding: 10px;">Tanggal Pinjam</th>
                    <th style="border: 1px solid #ddd; padding: 10px;">Tanggal Kembali</th>
                    <th style="border: 1px solid #ddd; padding: 10px;">Status</th>
                    <th style="border: 1px solid #ddd; padding: 10px;">Detail</th>

                    @role('Admin|Petugas')
                        <th style="border: 1px solid #ddd; padding: 10px;">Aksi</th>
                    @endrole
                </tr>
            </thead>

            <tbody>

                @forelse($peminjamans as $peminjaman)

                    <tr>
                        <td style="border: 1px solid #ddd; padding: 10px;">
                            {{ $peminjaman->id }}
                        </td>

                        <td style="border: 1px solid #ddd; padding: 10px;">
                            {{ $peminjaman->anggota->nama ?? '-' }}
                        </td>

                        <td style="border: 1px solid #ddd; padding: 10px;">
                            {{ $peminjaman->buku->judul ?? '-' }}
                        </td>

                        <td style="border: 1px solid #ddd; padding: 10px;">
                            {{ $peminjaman->tanggal_pinjam }}
                        </td>

                        <td style="border: 1px solid #ddd; padding: 10px;">
                            {{ $peminjaman->tanggal_kembali ?? '-' }}
                        </td>

                        <td style="border: 1px solid #ddd; padding: 10px;">
                            @if($peminjaman->tanggal_kembali)
                                <span style="color: green;">Dikembalikan</span>
                            @else
                                <span style="color: orange;">Dipinjam</span>
                            @endif
                        </td>

                        <td style="border: 1px solid #ddd; padding: 10px;">
                            <a href="{{ route('peminjaman.show', $peminjaman->id) }}">
                                Lihat Detail
                            </a>
                        </td>

                        @role('Admin|Petugas')
                            <td style="border: 1px solid #ddd; padding: 10px;">

                                @if(!$peminjaman->tanggal_kembali)

                                    <form
                                        action="{{ route('peminjaman.pengembalian', $peminjaman->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Proses pengembalian buku ini?')"
                                    >
                                        @csrf
                                        @method('PATCH')

                                        <button type="submit">
                                            Proses Pengembalian
                                        </button>
                                    </form>

                                @else
                                    Selesai
                                @endif

                            </td>
                        @endrole

                    </tr>

                @empty

                    <tr>
                        <td colspan="8" style="padding: 15px; text-align: center;">
                            Belum ada data peminjaman.
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>
    </div>

</div>

@endsection