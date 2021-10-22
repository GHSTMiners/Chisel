<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\AavegotchiTrait;
class AavegotchiTraitController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $aavegotchiTraits = AavegotchiTrait::all();

        return view('aavegotchiTraits.index', compact('aavegotchiTraits'));
    }
}
