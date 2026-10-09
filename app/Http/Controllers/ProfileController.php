<?php

namespace App\Http\Controllers;

use App\Models\SellerProfile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function edit()
    {
        // Ambil akun yang memiliki role penjual
        $user = User::where('role', 'penjual')->first();

        if (!$user) {
            abort(404, 'Akun penjual belum ditemukan.');
        }

        // Buat profil toko jika belum ada
        $profile = SellerProfile::firstOrCreate(
            ['user_id' => $user->id],
            [
                'store_name' => 'Lune Attiré',
                'category' => 'Fashion Wanita',
                'phone' => null,
                'address' => null,
                'description' => null,
            ]
        );

        return view('penjual.profil', compact(
            'user',
            'profile'
        ));
    }

    public function update(Request $request)
    {
        $user = User::where('role', 'penjual')->first();

        if (!$user) {
            abort(404, 'Akun penjual belum ditemukan.');
        }

        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->id),
            ],

            'store_name' => [
                'required',
                'string',
                'max:255',
            ],

            'phone' => [
                'nullable',
                'string',
                'max:20',
            ],

            'category' => [
                'required',
                'string',
                'max:255',
            ],

            'address' => [
                'nullable',
                'string',
            ],

            'description' => [
                'nullable',
                'string',
            ],
        ]);

        // Update akun penjual
        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
        ]);

        // Update profil toko
        SellerProfile::updateOrCreate(
            ['user_id' => $user->id],
            [
                'store_name' => $validated['store_name'],
                'phone' => $validated['phone'] ?? null,
                'category' => $validated['category'],
                'address' => $validated['address'] ?? null,
                'description' => $validated['description'] ?? null,
            ]
        );

        return back()->with(
            'status',
            'Profil toko berhasil diperbarui.'
        );
    }
    public function updatePassword(Request $request)
    {
        $user = User::where('role', 'penjual')->first();

        if (!$user) {
            abort(404, 'Akun penjual belum ditemukan.');
        }

        $validated = $request->validate([
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
            ],
        ]);

        $user->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back()->with(
            'status',
            'Password berhasil diperbarui.'
        );
    }
}
