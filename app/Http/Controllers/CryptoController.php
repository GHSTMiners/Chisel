<?php

namespace App\Http\Controllers;

use App\Models\Crypto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class CryptoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the crypto overview.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $crypto = Crypto::all();

        return view('crypto.index', compact('crypto'));
    }

    public function create() {
        return view('crypto.create');
    }

    public function destroy($id) {
        $crypto = Crypto::findOrFail($id);
        Storage::delete($crypto->soil_image);
        $crypto->delete();
        return redirect()->route('crypto');
    }

    public function edit($id) {
        $crypto = Crypto::findOrFail($id);
        return view('crypto.edit', compact('crypto'));
    }

    public function store() {
        $data = request()->validate([
            'name' => 'required',
            'wallet_address' => ['required', 'regex:/0x[\da-f]/i'],
            'weight' => ['required', 'numeric', 'between:0,99999.99'],
            'soil_image' => ['required', 'image'],
            'wallet_image' => ['required', 'image'],
        ]);

        $soilImagePath = request('soil_image')->store('crypto/soil', 'public');
        $walletImagePath = request('wallet_image')->store('crypto/wallet', 'public');

        \App\Models\Crypto::create([
            'name' => $data['name'],
            'wallet_address' => $data['wallet_address'],
            'weight' => $data['weight'],
            'soil_image' => $soilImagePath,
            'wallet_image' => $walletImagePath
        ]);
        return redirect()->route('crypto');
    }
}
