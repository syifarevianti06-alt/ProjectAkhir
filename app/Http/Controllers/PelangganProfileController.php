<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class PelangganProfileController extends Controller
{
    public function edit()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        return view('profil-pelanggan', compact('user'));
    }

    public function update(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
        ]);

        // Ubah data user
        $user->name = $request->name;
        $user->email = $request->email;

        // Simpan ke database
        $user->save();

        // Refresh data dari database
        $user->refresh();

        return redirect()
            ->route('profil')
            ->with('success', 'Profil berhasil diperbarui.');
    }
}
