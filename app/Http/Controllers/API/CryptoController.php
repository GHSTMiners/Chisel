<?php

namespace App\Http\Controllers\API;

use App\Models\Crypto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CryptoController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Crypto $crypto) {
        return $crypto;
    }
}
