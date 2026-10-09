<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    //Menampilkan daftar pengguna

    public function index(Request $request)
    {
        $query = User::query();

        // Search nama / email
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%');
            });
        }

        // Filter role
        if ($request->filled('role')) {
            $query->where('role', $request->role);
        }

        $users = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        // Statistik
        $totalPengguna = User::count();

        $totalPelanggan = User::where('role', 'pelanggan')->count();

        $totalPenjual = User::where('role', 'penjual')->count();

        $totalAdmin = User::where('role', 'admin')->count();

        return view('admin.pengguna', compact(
            'users',
            'totalPengguna',
            'totalPelanggan',
            'totalPenjual',
            'totalAdmin'
        ));
    }


    // Form tambah pengguna

    public function create()
    {
        return view('admin.pengguna-create');
    }


    //Menyimpan pengguna baru

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email',
            ],

            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
            ],

            'role' => [
                'required',
                'in:admin,penjual,pelanggan',
            ],
        ]);

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
        ]);

        return redirect()
            ->route('admin.pengguna')
            ->with('success', 'Pengguna berhasil ditambahkan.');
    }


    //Form edit pengguna

    public function edit(User $user)
    {
        return view('admin.pengguna-edit', compact('user'));
    }


    // Update pengguna

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email,' . $user->id,
            ],

            'role' => [
                'required',
                'in:admin,penjual,pelanggan',
            ],

            'password' => [
                'nullable',
                'string',
                'min:8',
                'confirmed',
            ],
        ]);

        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->role = $data['role'];

        // Password diubah jika diisi
        if (!empty($data['password'])) {
            $user->password = Hash::make($data['password']);
        }

        $user->save();

        return redirect()
            ->route('admin.pengguna')
            ->with('success', 'Data pengguna berhasil diperbarui.');
    }


    //Hapus pengguna

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()
            ->route('admin.pengguna')
            ->with('success', 'Pengguna berhasil dihapus.');
    }
}
