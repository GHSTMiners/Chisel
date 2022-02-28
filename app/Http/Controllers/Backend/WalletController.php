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
}
