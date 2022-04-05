<?php

namespace App\Http\Controllers\API;

use App\Models\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\IpAddress;
use App\Models\Gotchi;
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
}
