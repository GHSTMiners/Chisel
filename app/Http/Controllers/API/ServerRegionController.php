<?php

namespace App\Http\Controllers\API;

use App\Models\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\IpAddress;
use App\Models\Gotchi;
use App\Models\Wallet;

use App\Models\ServerRegion;

class ServerRegionController extends Controller
{
    public function __construct()
    {
        // $this->middleware('api_key');
    }

    public function regions()
    {
        return response()->json(
            ServerRegion::where('active', true)->get(),
            200, [], JSON_UNESCAPED_SLASHES
        );
    }

    
}
