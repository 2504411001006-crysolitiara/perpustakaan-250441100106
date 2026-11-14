<?php

namespace App\Policies;

use App\Models\Peminjaman;
use App\Models\User;

class PeminjamanPolicy
{
    /**
     * Menentukan siapa yang boleh melihat daftar peminjaman.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasAnyRole(['Admin', 'Petugas', 'Siswa']);
    }

    /**
     * Menentukan siapa yang boleh melihat detail peminjaman.
     */
    public function view(User $user, Peminjaman $peminjaman): bool
    {
        // Admin dan Petugas boleh melihat semua peminjaman.
        if ($user->hasAnyRole(['Admin', 'Petugas'])) {
            return true;
        }

        // Siswa hanya boleh melihat peminjamannya sendiri.
        if ($user->hasRole('Siswa')) {
            $anggota = $user->anggota;

            return $anggota !== null
                && $anggota->id === $peminjaman->anggota_id;
        }

        return false;
    }

    public function create(User $user): bool
    {
        return $user->hasAnyRole(['Admin', 'Petugas']);
    }

    public function update(User $user, Peminjaman $peminjaman): bool
    {
        return $user->hasAnyRole(['Admin', 'Petugas']);
    }

    public function delete(User $user, Peminjaman $peminjaman): bool
    {
        return $user->hasAnyRole(['Admin', 'Petugas']);
    }

    public function restore(User $user, Peminjaman $peminjaman): bool
    {
        return false;
    }

    public function forceDelete(User $user, Peminjaman $peminjaman): bool
    {
        return false;
    }
}