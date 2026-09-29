<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (!Auth::attempt($credentials)) {
            return back()
                ->withErrors([
                    'email' => 'Email atau password salah.',
                ])
                ->withInput($request->only('email'));
        }

        $request->session()->regenerate();

        $user = Auth::user();

        // Cek status akun
        if ($user->status !== 'aktif') {
            Auth::logout();

            return back()
                ->withErrors([
                    'email' => 'Akun Anda sedang nonaktif.',
                ])
                ->withInput($request->only('email'));
        }

        // ADMIN
        if ($user->isAdmin()) {
            return redirect()->route('admin.dashboard');
        }

        // PENJUAL
        if ($user->isPenjual()) {
            return redirect()->route('penjual.dashboard');
        }

        // PELANGGAN
        if ($user->isPelanggan()) {
            return redirect()->route('pelanggan.beranda');
        }

        // Jika role tidak valid
        Auth::logout();

        return back()
            ->withErrors([
                'email' => 'Role pengguna tidak valid.',
            ])
            ->withInput($request->only('email'));
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],

            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email',
            ],

            'password' => [
                'required',
                'min:8',
                'confirmed',
            ],
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => 'pelanggan',
            'status' => 'aktif',
        ]);

        Auth::login($user);

        $request->session()->regenerate();

        return redirect()->route('pelanggan.beranda');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}