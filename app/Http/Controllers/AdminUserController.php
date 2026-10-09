<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{

    // Menampilkan semua user.

    public function index()
    {
        $users = User::latest()->get();

        return view('Admin.user.index', compact('users'));
    }


    //Menampilkan detail user.

    public function show(User $user)
    {
        return view('Admin.user.show', compact('user'));
    }


    // Mengubah status user.

    public function updateStatus(Request $request, User $user)
    {
        $request->validate([
            'status' => 'required|in:aktif,nonaktif',
        ]);

        $user->status = $request->status;
        $user->save();

        return redirect()
            ->route('admin.user.index')
            ->with('success', 'Status user berhasil diperbarui.');
    }


    //Method resource lainnya tidak digunakan.

    public function create()
    {
        abort(404);
    }

    public function store(Request $request)
    {
        abort(404);
    }

    public function edit(User $user)
    {
        abort(404);
    }

    public function update(Request $request, User $user)
    {
        abort(404);
    }

    public function destroy(User $user)
    {
        abort(404);
    }
}
