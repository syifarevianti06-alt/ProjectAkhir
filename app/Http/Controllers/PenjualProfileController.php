<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PenjualProfileController extends Controller
{
    // Menampilkan profil asli dari akun yang login
    public function index()
    {
        $profile = Auth::user();

        if (!$profile) {
            return redirect()->route('login');
        }

        return view('Penjual.profil', compact('profile'));
    }

    // Menampilkan halaman edit
    public function edit()
    {
        $profile = Auth::user();

        if (!$profile) {
            return redirect()->route('login');
        }

        return view('Penjual.profil-edit', compact('profile'));
    }

    // Menyimpan perubahan profil
    public function update(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        $data = $request->validate([
            'store_name' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:30',
            'address' => 'nullable|string|max:1000',
            'description' => 'nullable|string|max:2000',
        ]);

        $user->fill($data);
        $user->save();

        return redirect()
            ->route('penjual.profil')
            ->with('success', 'Profil berhasil diperbarui.');
    }

    // Mengubah password akun
    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => [
                'required',
                'confirmed',
                Password::defaults(),
            ],
        ]);

        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()
            ->route('penjual.profil')
            ->with('success', 'Password berhasil diperbarui.');
    }
}
