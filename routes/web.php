<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\LaporanController;

// Halaman utama dan buku
Route::get('/', [BukuController::class, 'home'])->name('home');
Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');
Route::get('/buku/{id}', [BukuController::class, 'show'])->name('buku.show');

// Dashboard berdasarkan role
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        $user = auth()->user();

        if ($user->hasRole('Admin')) {
            return redirect()->route('admin.dashboard');
        }

        if ($user->hasRole('Petugas')) {
            return redirect()->route('petugas.dashboard');
        }

        if ($user->hasRole('Siswa')) {
            return redirect()->route('siswa.dashboard');
        }

        abort(403, 'Akun Anda belum memiliki role.');
    })->name('dashboard');

});

// Dashboard Admin
Route::middleware(['auth', 'role:Admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::view('/dashboard', 'dashboard.admin')->name('dashboard');

        Route::get('/users', [UserController::class, 'index'])
            ->name('users.index');

        Route::patch('/users/{user}/role', [UserController::class, 'updateRole'])
            ->name('users.updateRole');
    });

// Dashboard Petugas
Route::middleware(['auth', 'role:Petugas'])
    ->prefix('petugas')
    ->name('petugas.')
    ->group(function () {

        Route::view('/dashboard', 'dashboard.petugas')->name('dashboard');
    });

// Dashboard Siswa
Route::middleware(['auth', 'role:Siswa'])
    ->prefix('siswa')
    ->name('siswa.')
    ->group(function () {

        Route::view('/dashboard', 'dashboard.siswa')->name('dashboard');
    });

// Data peminjaman
Route::middleware(['auth'])->group(function () {

    Route::get('/peminjaman', [PeminjamanController::class, 'index'])
        ->name('peminjaman.index');

    Route::get('/peminjaman/{peminjaman}', [PeminjamanController::class, 'show'])
        ->name('peminjaman.show');
});

// Proses peminjaman dan pengembalian
Route::middleware(['auth', 'role:Admin|Petugas'])->group(function () {

    Route::post('/peminjaman', [PeminjamanController::class, 'store'])
        ->name('peminjaman.store');

    Route::patch('/peminjaman/{peminjaman}/pengembalian', [
        PeminjamanController::class,
        'pengembalian'
    ])->name('peminjaman.pengembalian');
});

// Laporan Admin dan Petugas
Route::middleware(['auth', 'role:Admin|Petugas'])->group(function () {

    Route::get('/laporan', [LaporanController::class, 'index'])
        ->name('laporan.index');
});

// Profil pengguna
Route::middleware(['auth'])->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__.'/auth.php';