<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('roles')
            ->latest()
            ->paginate(10);

        $roles = Role::where('guard_name', 'web')->get();

        return view('admin.users.index', compact('users', 'roles'));
    }

    public function updateRole(Request $request, User $user)
    {
        $request->validate([
            'role' => ['required', 'exists:roles,name'],
        ]);

        // Admin tidak boleh mengubah role akunnya sendiri.
        if ($user->id === auth()->id()) {
            return back()->with('error', 'Anda tidak dapat mengubah role akun sendiri.');
        }

        $role = Role::where('name', $request->role)
            ->where('guard_name', 'web')
            ->firstOrFail();

        $user->syncRoles([$role]);

        return back()->with('success', 'Role pengguna berhasil diperbarui.');
    }
}