<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Peminjaman;
use App\Policies\PeminjamanPolicy;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Policy untuk mengatur akses detail peminjaman
        Gate::policy(Peminjaman::class, PeminjamanPolicy::class);

        // Gate untuk mengatur pengelolaan buku
        Gate::define('kelola-buku', function (User $user) {
            return $user->hasAnyRole(['Admin', 'Petugas']);
        });
    }
}