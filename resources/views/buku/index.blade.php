@extends('layouts.perpustakaan')

@section('title', 'Daftar Buku')

@section('content')

<div class="container">

    {{-- HEADER DAFTAR BUKU --}}
    <div style="
        background: linear-gradient(135deg, #611D20, #87383B);
        padding: 35px 40px;
        border-radius: 16px;
        margin-bottom: 30px;
        color: #FFF9F0;
        box-shadow: 0 8px 20px rgba(97, 29, 32, 0.15);
    ">

        <div style="
            font-size: 12px;
            letter-spacing: 3px;
            color: #E8C98B;
            margin-bottom: 12px;
            font-weight: bold;
        ">
            PERPUSTAKAAN DIGITAL
        </div>

        <h2 style="
            font-size: 32px;
            font-weight: 700;
            margin: 0 0 12px 0;
            color: #FFF9F0;
        ">
            Koleksi Buku
        </h2>

        <p style="
            font-size: 15px;
            line-height: 1.7;
            margin: 0;
            color: #F3E5D5;
            max-width: 550px;
        ">
            Temukan berbagai koleksi bacaan menarik dan perluas wawasanmu
            melalui buku-buku pilihan kami.
        </p>

        <div style="
            display: inline-block;
            margin-top: 22px;
            padding: 8px 16px;
            border: 1px solid #D9B978;
            border-radius: 30px;
            color: #F3D99F;
            font-size: 12px;
            letter-spacing: 1px;
        ">
            ✦ EXPLORE OUR COLLECTION
        </div>

    </div>

    <p id="pesan"></p>

    {{-- FORM TAMBAH DAN UBAH BUKU --}}
    @auth
        @role('Admin|Petugas')

            <div style="
                background: #FFFDF9;
                padding: 25px;
                border-radius: 14px;
                border: 1px solid #E9DDD2;
                margin-bottom: 30px;
            ">

                <h3 id="judul-form" style="
                    color: #611D20;
                    font-size: 21px;
                    font-weight: 700;
                    margin-bottom: 20px;
                ">
                    Tambah Buku
                </h3>

                <form id="form-buku">

                    <div style="margin-bottom: 15px;">
                        <label for="kategori_id">Kategori</label><br>
                        <select id="kategori_id" name="kategori_id" required>
                            <option value="">Pilih Kategori</option>
                            <option value="1">Novel</option>
                            <option value="2">Fantasi</option>
                            <option value="3">Pengembangan Diri</option>
                        </select>
                    </div>

                    <div style="margin-bottom: 15px;">
                        <label for="judul">Judul Buku</label><br>
                        <input
                            type="text"
                            id="judul"
                            name="judul"
                            minlength="3"
                            maxlength="150"
                            required
                        >
                    </div>

                    <div style="margin-bottom: 15px;">
                        <label for="penulis">Penulis</label><br>
                        <input
                            type="text"
                            id="penulis"
                            name="penulis"
                            minlength="3"
                            maxlength="100"
                            required
                        >
                    </div>

                    <div style="margin-bottom: 20px;">
                        <label for="tahun_terbit">Tahun Terbit</label><br>
                        <input
                            type="number"
                            id="tahun_terbit"
                            name="tahun_terbit"
                            min="1900"
                            max="{{ date('Y') }}"
                            required
                        >
                    </div>

                    <button type="submit" id="tombol-simpan">
                        Tambah Buku
                    </button>

                    <button type="button" id="batal-ubah" hidden>
                        Batal
                    </button>

                </form>

            </div>

        @endrole
    @endauth

    {{-- TABEL KOLEKSI BUKU --}}
    <div style="
        background: #FFFDF9;
        padding: 25px;
        border-radius: 14px;
        border: 1px solid #E9DDD2;
    ">

        <h3 style="
            color: #611D20;
            font-size: 21px;
            font-weight: 700;
            margin-bottom: 20px;
        ">
            Koleksi Buku
        </h3>

        <div style="overflow-x: auto;">

            <table style="
                width: 100%;
                border-collapse: collapse;
                text-align: left;
            ">

                <thead>
                    <tr style="background: #611D20; color: #FFF9F0;">

                        <th style="padding: 13px;">ID</th>
                        <th style="padding: 13px;">Kategori</th>
                        <th style="padding: 13px;">Judul</th>
                        <th style="padding: 13px;">Penulis</th>
                        <th style="padding: 13px;">Tahun Terbit</th>

                        @auth
                            @role('Admin|Petugas')
                                <th style="padding: 13px;">Aksi</th>
                            @endrole
                        @endauth

                    </tr>
                </thead>

                <tbody id="tabel-buku">

                    <tr>
                        <td colspan="6" style="padding: 15px; text-align: center;">
                            Memuat data buku...
                        </td>
                    </tr>

                </tbody>

            </table>

        </div>

    </div>

</div>


<script>

const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content;

const bolehKelola = @json(
    auth()->check() && auth()->user()->hasAnyRole(['Admin', 'Petugas'])
);


// ==========================================
// GET: MENAMPILKAN DAFTAR BUKU
// ==========================================

async function tampilkanBuku() {

    const tabel = document.getElementById('tabel-buku');
    const pesan = document.getElementById('pesan');

    try {

        const response = await fetch('/api/buku', {
            credentials: 'same-origin',
            headers: {
                'Accept': 'application/json'
            }
        });

        if (!response.ok) {
            throw new Error('Gagal mengambil data buku.');
        }

        const hasil = await response.json();
        const daftarBuku = hasil.data;

        tabel.innerHTML = '';

        if (!daftarBuku || daftarBuku.length === 0) {

            tabel.innerHTML = `
                <tr>
                    <td colspan="6" style="padding:15px;text-align:center;">
                        Data buku tidak ditemukan.
                    </td>
                </tr>
            `;

            return;
        }

        daftarBuku.forEach(buku => {

            const baris = document.createElement('tr');

            [
                buku.id,
                buku.kategori ?? '-',
                buku.judul ?? '-',
                buku.penulis ?? '-',
                buku.tahun_terbit ?? '-'
            ].forEach(nilai => {

                const kolom = document.createElement('td');

                kolom.style.padding = '13px';
                kolom.style.borderBottom = '1px solid #E9DDD2';

                // Perlindungan XSS
                kolom.textContent = nilai;

                baris.appendChild(kolom);

            });

            if (bolehKelola) {

                const kolomAksi = document.createElement('td');

                kolomAksi.style.padding = '13px';
                kolomAksi.style.borderBottom = '1px solid #E9DDD2';

                // TOMBOL UBAH
                const tombolUbah = document.createElement('button');

                tombolUbah.textContent = 'Ubah';
                tombolUbah.type = 'button';

                tombolUbah.addEventListener('click', function () {

                    const form = document.getElementById('form-buku');

                    document.getElementById('kategori_id').value =
                        buku.kategori_id ?? '';

                    document.getElementById('judul').value =
                        buku.judul ?? '';

                    document.getElementById('penulis').value =
                        buku.penulis ?? '';

                    document.getElementById('tahun_terbit').value =
                        buku.tahun_terbit ?? '';

                    form.dataset.id = buku.id;

                    document.getElementById('judul-form').textContent =
                        'Ubah Buku';

                    document.getElementById('tombol-simpan').textContent =
                        'Simpan Perubahan';

                    document.getElementById('batal-ubah').hidden = false;

                    form.scrollIntoView({ behavior: 'smooth' });

                });

                kolomAksi.appendChild(tombolUbah);


                // TOMBOL HAPUS
                const tombolHapus = document.createElement('button');

                tombolHapus.textContent = 'Hapus';
                tombolHapus.type = 'button';
                tombolHapus.style.marginLeft = '5px';

                tombolHapus.addEventListener('click', async function () {

                    if (!confirm(`Yakin ingin menghapus buku "${buku.judul}"?`)) {
                        return;
                    }

                    try {

                        const response = await fetch(`/api/buku/${buku.id}`, {
                            method: 'DELETE',
                            credentials: 'same-origin',
                            headers: {
                                'Accept': 'application/json',
                                'X-CSRF-TOKEN': csrfToken
                            }
                        });

                        const hasil = await response.json();

                        if (!response.ok) {
                            throw new Error(
                                hasil.message || 'Gagal menghapus buku.'
                            );
                        }

                        pesan.textContent = hasil.message;
                        pesan.style.color = 'green';

                        await tampilkanBuku();

                    } catch (error) {

                        pesan.textContent = error.message;
                        pesan.style.color = 'red';

                    }

                });

                kolomAksi.appendChild(tombolHapus);

                baris.appendChild(kolomAksi);

            }

            tabel.appendChild(baris);

        });

    } catch (error) {

        pesan.textContent = error.message;
        pesan.style.color = 'red';

        tabel.innerHTML = `
            <tr>
                <td colspan="6" style="padding:15px;text-align:center;">
                    Data buku gagal dimuat.
                </td>
            </tr>
        `;

    }

}


// ==========================================
// POST DAN PUT: TAMBAH / UBAH BUKU
// ==========================================

if (bolehKelola) {

    document.getElementById('form-buku').addEventListener('submit', async function (event) {

        event.preventDefault();

        const form = this;
        const pesan = document.getElementById('pesan');
        const id = form.dataset.id;

        const dataBuku = {

            kategori_id: document.getElementById('kategori_id').value,
            judul: document.getElementById('judul').value,
            penulis: document.getElementById('penulis').value,
            tahun_terbit: document.getElementById('tahun_terbit').value

        };

        try {

            const response = await fetch(
                id ? `/api/buku/${id}` : '/api/buku',
                {
                    method: id ? 'PUT' : 'POST',

                    credentials: 'same-origin',

                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },

                    body: JSON.stringify(dataBuku)
                }
            );

            const hasil = await response.json();

            if (!response.ok) {

                const kesalahan = hasil.errors
                    ? Object.values(hasil.errors).flat().join(', ')
                    : hasil.message || 'Gagal menyimpan data buku.';

                throw new Error(kesalahan);

            }

            pesan.textContent = hasil.message;
            pesan.style.color = 'green';

            form.reset();

            delete form.dataset.id;

            document.getElementById('judul-form').textContent =
                'Tambah Buku';

            document.getElementById('tombol-simpan').textContent =
                'Tambah Buku';

            document.getElementById('batal-ubah').hidden = true;

            await tampilkanBuku();

        } catch (error) {

            pesan.textContent = error.message;
            pesan.style.color = 'red';

        }

    });


    // BATAL UBAH BUKU
    document.getElementById('batal-ubah').addEventListener('click', function () {

        const form = document.getElementById('form-buku');

        form.reset();

        delete form.dataset.id;

        document.getElementById('judul-form').textContent =
            'Tambah Buku';

        document.getElementById('tombol-simpan').textContent =
            'Tambah Buku';

        this.hidden = true;

        document.getElementById('pesan').textContent = '';

    });

}


// TAMPILKAN DATA SAAT HALAMAN DIBUKA
tampilkanBuku();

</script>

@endsection