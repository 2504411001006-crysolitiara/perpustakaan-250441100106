<x-app-layout>
    <div style="background:#f8f5f3; min-height:80vh; padding:40px 7%;">

    <div style="margin-bottom:30px;">
        <p style="color:#8b4245;">PERPUSTAKAAN TIARA</p>
        <h1 style="color:#611D20; font-size:30px; font-weight:bold;">
            Selamat Datang, {{ Auth::user()->name }}!
        </h1>
        <p style="color:#666; margin-top:8px;">
            Selamat datang di halaman dashboard perpustakaan.
        </p>
    </div>

    <div style="background:white; padding:25px; border-radius:12px;
                box-shadow:0 3px 12px rgba(0,0,0,.05); margin-bottom:25px;">

        <h2 style="color:#611D20; font-size:20px; font-weight:bold;">
            Informasi Akun
        </h2>

        <p style="margin-top:15px;">
            <strong>Nama:</strong> {{ Auth::user()->name }}
        </p>

        <p style="margin-top:8px;">
            <strong>Email:</strong> {{ Auth::user()->email }}
        </p>

        <p style="margin-top:8px;">
            <strong>Role:</strong>
            {{ Auth::user()->getRoleNames()->first() ?? 'Belum memiliki role' }}
        </p>
    </div>

    <div style="display:flex; gap:15px; flex-wrap:wrap;">

        <a href="{{ route('home') }}"
           style="background:#611D20; color:white; padding:14px 22px;
                  border-radius:8px; text-decoration:none;">
            Kembali ke Beranda
        </a>

        <a href="{{ route('buku.index') }}"
           style="background:#8b4245; color:white; padding:14px 22px;
                  border-radius:8px; text-decoration:none;">
            Lihat Daftar Buku
        </a>

    </div>
</div>

</x-app-layout>
