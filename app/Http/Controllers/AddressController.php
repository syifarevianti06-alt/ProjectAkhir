<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function create()
    {
        return view('addresses.form', ['address' => null]);
    }

    public function edit(Address $address)
    {
        abort_unless($address->user_id === auth()->id(), 403);
        return view('addresses.form', compact('address'));
    }

    protected function rules(): array
    {
        return [
            'name' => ['required','string','max:255'],
            'phone' => ['required','string','max:20'],
            'address' => ['required','string'],
            'city' => ['required','string','max:100'],
            'postal_code' => ['required','string','max:10'],
        ];
    }

    public function store(Request $request)
    {
        $validated = $request->validate($this->rules());
        $request->user()->addresses()->update(['is_default' => false]);
        $request->user()->addresses()->create($validated + ['is_default' => true]);

        return redirect()->route('checkout.index');
    }

    public function update(Request $request, Address $address)
    {
        abort_unless($address->user_id === $request->user()->id, 403);
        $validated = $request->validate($this->rules());
        $address->update($validated);

        return redirect()->route('checkout.index');
    }
}