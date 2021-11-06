<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Ethereum\Ethereum;
use Ethereum\SmartContract;
use Illuminate\Support\Facades\Http;

class AavegotchiController extends Controller
{
    public function view($nftId) {
        $moralisAPIUrl = env('MORALIS_API_URL');
        $moralisAPIKey = env('MORALIS_API_KEY');

        $aavegotchiNFTAddress = '0x86935f11c86623dec8a25696e1c19a8659cbf95d';
        $response = Http::withHeaders( [
            'accept' => 'application/json',
            'X-API-Key' => $moralisAPIKey,
        ])->get(url("{$moralisAPIUrl}/nft/{$aavegotchiNFTAddress}/{$nftId}"), [
            'chain' => 'polygon',
            'format' => 'decimal'
        ]);

        dd(json_decode($response->object()->metadata)->image_data);

        // Return info as JSON
        return response()->json(
            $response->json(),
            200, [], JSON_UNESCAPED_SLASHES
        );
        return $response->json();
    }
}
