<?php

namespace App\Http\Controllers\API;
use App\Http\Requests\StatisticEntryRequest;

use App\Models\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Game;
use App\Models\Gotchi;
use App\Models\Wallet;
use App\Models\GameStatisticEntry;
use App\Models\GameStatisticCategory;


class GameController extends Controller
{
    public function __construct()
    {
        $this->middleware('api_key');
    }

    public function create()
    {
        // Validate request data
        $data = request()->validate([
            'world_id' =>  ['required', 'numeric', 'exists:worlds,id']
        ]);

        //Generate a random uuid
        $game = Game::create([
            'world_id' => $data['world_id'],
            'room_id' => Str::uuid()
        ]);

        return response()->json(
            $game,
            200, [], JSON_UNESCAPED_SLASHES
        );
    }

    public function add_statistics(StatisticEntryRequest $request)
    {
        // Validate request data
        $data = $request->validate([
            'room_id' => ['required', 'uuid', 'exists:games,room_id'],
            'gotchi_id' => ['required', 'numeric', 'exists:gotchis,gotchi_id'],
            'wallet_address' => ['required', 'string', 'regex:/0x[\da-f]/i', 'exists:wallets,address'],
            'categories' =>  ['required', 'array'],
            'values' =>  ['required', 'array'],
            'categories.*' =>  ['string', 'exists:game_statistic_categories,name'],
            'values.*' =>  ['numeric'],
        ]);

        //Validate that arrays size of values and categories is the same
        if(count($data['categories']) !== count($data['values'])) {
            abort(405, "Categories and values array sizes are not the same");
        }

        //Find the game for this request
        $game = Game::where('room_id', $data['room_id'])->firstOrFail();

        //Find the gotchi for this request
        $gotchi = Gotchi::where('gotchi_id', $data['gotchi_id'])->firstOrFail();

        //Find the wallet for this request
        $wallet = Wallet::where('address', $data['wallet_address'])->firstOrFail();

        if(isset($game) && isset($gotchi) && isset($wallet)) {
            //Enter category entries into array
            for ($i=0; $i < count($data['categories']); $i++) { 
                $category = GameStatisticCategory::where('name', $data['categories'][$i])->firstOrFail();
                GameStatisticEntry::create([
                    'game_id' => $game->id,
                    'gotchi_id' => $gotchi->id,
                    'wallet_id' => $wallet->id,
                    'game_statistic_category_id' => $category->id,
                    'value' => $data['values'][$i]
                ]);
            }
        } else abort(405, "Couldn't find something");

        return response()->json(
            $game,
            200, [], JSON_UNESCAPED_SLASHES
        );
    }
}
