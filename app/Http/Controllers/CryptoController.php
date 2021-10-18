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
        $this->middleware('worldInjector');
    }

    /**
     * Show the crypto overview.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $crypto = request()->selectedWorld->crypto;
        return view('crypto.index', compact('crypto'));
    }

    public function create() {
        return view('crypto.create');
    }

    public function destroy(Crypto $crypto) {
        Storage::delete($crypto->soil_image);
        $crypto->delete();
        return redirect()->route('crypto.index');
    }

    public function edit(Crypto $crypto) {
        return view('crypto.edit', compact('crypto'));
    }

    public function update(Crypto $crypto) {
        $data = request()->validate([
            'name' => '',
            'wallet_address' => ['regex:/0x[\da-f]/i'],
            'weight' => ['numeric', 'between:0,99999.99'],
            'soil_image' => ['image'],
            'wallet_image' => ['image'],
        ]);

        if(array_key_exists('soil_image', $data)) $data['soil_image'] = $data['soil_image']->store('/soil', 'public');
        if(array_key_exists('wallet_image', $data)) $data['wallet_image'] = $data['wallet_image']->store('/soil', 'public');

        $crypto->update($data);
        return redirect()->route('crypto.index');
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
            'world_id' => request()->selectedWorld->id,
            'wallet_address' => $data['wallet_address'],
            'weight' => $data['weight'],
            'soil_image' => $soilImagePath,
            'wallet_image' => $walletImagePath
        ]);
        return redirect()->route('crypto.index');
    }
}
