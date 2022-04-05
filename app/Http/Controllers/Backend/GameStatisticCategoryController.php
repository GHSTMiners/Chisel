<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GameStatisticCategory;


class GameStatisticCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $statisticCategories = GameStatisticCategory::all();
        return view('backend.statisticCategories.index', compact('statisticCategories'));
    }
}
