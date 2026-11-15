@extends('layouts.perpustakaan')

@section('title', 'Detail Peminjaman')

@section('content')

<div class="container">

    <h2>Detail Peminjaman</h2>

    <div style="margin-top: 20px; line-height: 2;">

        <p><strong>ID Peminjaman:</strong> {{ $peminjaman->id }}</p>

        <p><strong>Nama Anggota:</strong>
            {{ $peminjaman->anggota->nama ?? '-' }}
        </p>

        <p><strong>Email Anggota:</strong>
            {{ $peminjaman->anggota->email ?? '-' }}
        </p>

        <p><strong>Judul Buku:</strong>
            {{ $peminjaman->buku->judul ?? '-' }}
        </p>

        <p><strong>Kategori:</strong>
            {{ $peminjaman->buku->kategori->nama ?? '-' }}
        </p>

        <p><strong>Tanggal Pinjam:</strong>
            {{ $peminjaman->tanggal_pinjam }}
        </p>

        <p><strong>Tanggal Kembali:</strong>
            {{ $peminjaman->tanggal_kembali ?? 'Belum dikembalikan' }}
        </p>

        <p><strong>Status:</strong>
            @if($peminjaman->tanggal_kembali)
                <span style="color: green;">Dikembalikan</span>
            @else
                <span style="color: orange;">Dipinjam</span>
            @endif
        </p>

    </div>

    <br>

    <a href="{{ route('peminjaman.index') }}">
        Kembali ke Daftar Peminjaman
    </a>

</div>

@endsection