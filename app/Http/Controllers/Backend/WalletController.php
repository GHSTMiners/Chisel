<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Wallet;

class WalletController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        //Calculate stuff
        $rowCount = Wallet::count();
        $pageSize = 50;
        $currentPage = request()->query('page', 0);
        $pageCount = ceil($rowCount / $pageSize);
        
        $wallets = Wallet::offset($currentPage*$pageSize)->limit($pageSize)->get();
        return view('backend.wallets.index', compact('wallets', 'pageCount', 'currentPage'));
    }

    public function create() {
        return view('backend.wallets.create');
    }

    public function edit(Wallet $wallet) {
        return view('backend.wallets.edit', compact('wallet'));
    }

    public function update(Wallet $wallet) {
        $data = request()->validate([
            'admin' => 'boolean',
            'developer' => 'boolean',
            'moderator' => 'boolean'
        ]);

        if(!array_key_exists('admin', $data)) $data['admin'] = FALSE;
        if(!array_key_exists('developer', $data)) $data['developer'] = FALSE;
        if(!array_key_exists('moderator', $data)) $data['moderator'] = FALSE;

        $wallet->role->update($data);
        return redirect()->route('wallet.index');
    }

    public function store() {
        $data = request()->validate([
            'address' => ['required', 'string', 'regex:/0x[\da-f]/i'],
            'chain_id' => ['required', 'numeric', 'gte:0'],
            'admin' => 'boolean',
            'developer' => 'boolean',
            'moderator' => 'boolean'
        ]);

        if(!array_key_exists('admin', $data)) $data['admin'] = FALSE;
        if(!array_key_exists('developer', $data)) $data['developer'] = FALSE;
        if(!array_key_exists('moderator', $data)) $data['moderator'] = FALSE;

        $wallet = \App\Models\Wallet::create($data);      
        return redirect()->route('wallet.index');
    }

    public function destroy(Wallet $wallet) {
        $wallet->delete();
        return redirect()->route('wallet.index');
    }  
}
