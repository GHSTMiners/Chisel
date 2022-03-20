<?php

namespace App\Http\Controllers\API;

use App\Models\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\IpAddress;
use App\Models\Gotchi;
use App\Models\Wallet;

class LogController extends Controller
{
    public function __construct()
    {
        $this->middleware('api_key');
    }

    public function index() {
        abort(404);
    }

    public function store() {
        $data = request()->validate([
            'event' => 'required', 'string',
            'score' => 'required', 'number',
            'ip_address' => ['required', 'ip'],
            'gotchi' => ['numeric', 'between:0,99999.99'],
            'wallet_address' => ['regex:/0x[\da-f]/i'],
            'wallet_chain_id' => ['required_with:wallet_address', 'numeric', 'min:0,']
        ]);

        // 1) Lookup if ip_address is in DB; if it's not, create it
        $ip_address = IpAddress::firstOrCreate([
            'ip' => $data['ip_address']
        ]);

        // 2) If gotchi argument is available, look it up in the database (or create it if it exists)
        $gotchi = null;
        if (array_key_exists('gotchi', $data)){
            $gotchi = Gotchi::firstOrCreate([
                    'gotchi_id' => $data['gotchi']
            ]);
        }
        
        // 3) If the wallet_address is supplied, look it up in the database (or create it if it exists)
        $wallet = null;
        if (array_key_exists('wallet_address', $data)){
            $wallet = Wallet::firstOrCreate([
                'address' => $data['wallet_address'],
                'chain_id' => $data['wallet_chain_id']
            ]);
        }
        return Log::create([
            'score' => $data['score'],
            'event' => $data['event'],
            'ip_address_id' => $ip_address->id,
            'gotchi_id' => $gotchi ? $gotchi->id : null,
            'wallet_id' => $wallet ? $wallet->id : null
        ]);
    }
}
