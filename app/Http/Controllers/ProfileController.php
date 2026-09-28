<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function edit(Request $request)
    {
        return view('profile.edit', ['user' => $request->user()]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required','string','max:255'],
            'email' => ['required','email', Rule::unique('users','email')->ignore($request->user()->id)],
            'phone' => ['nullable','string','max:20'],
        ]);

        $request->user()->update($validated);

        return back()->with('status', 'Profil berhasil diperbarui.');
    }
}