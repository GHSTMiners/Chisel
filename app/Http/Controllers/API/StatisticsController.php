<?php

namespace App\Http\Controllers\API;

use App\Models\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\IpAddress;
use App\Models\Gotchi;
use App\Models\Wallet;

use App\Models\GameStatisticCategory;

class StatisticsController extends Controller
{
    public function __construct()
    {
        // $this->middleware('api_key');
    }

    public function categories()
    {
        return response()->json(
            GameStatisticCategory::all(),
            200, [], JSON_UNESCAPED_SLASHES
        );
    }

    public function gotchi($category_id) {
        //Fetch category
        $category = GameStatisticCategory::findOrFail($category_id);

        //Parse request
        $data = request()->validate([
            'gotchi_id' => ['required', 'numeric', 'exists:gotchis,gotchi_id'],
            'wallet_address' => ['string', 'regex:/0x[\da-f]/i', 'exists:wallets,address']
        ]);

        //Prepare query
        $query = $category->entries();

        //Filter gotchi ID if user requests
        if(array_key_exists('gotchi_id', $data)) {
            //Fetch gotchi table if for this id
            $gotchi = Gotchi::where('gotchi_id', $data['gotchi_id'])->firstOrFail();
            $query = $query->where('gotchi_id', $gotchi->id);
        }

        //Filter wallet address if user requests
        if(array_key_exists('wallet_address', $data)) {
            //Fetch gotchi table if for this id
            $wallet = Wallet::where('address', $data['wallet_address'])->firstOrFail();
            $query = $query->where('wallet_id', $wallet->id);
        }

        $query = $query->with('gotchi', 'wallet');
        
        return response()->json(
            $query->get(),
            200, [], JSON_UNESCAPED_SLASHES
        );
    }

    public function highscores($category_id) {
        //Fetch category
        $category = GameStatisticCategory::findOrFail($category_id);

        //Prepare query
        $query = $category->highscores();

        $query = $query->with('gotchi', 'entry');
        
        return response()->json(
            $query->get(),
            200, [], JSON_UNESCAPED_SLASHES
        );
    }
}
