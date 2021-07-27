<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ItemCondition;
use App\Models\PrimaryCategory;

class SellController extends Controller
{
    public function showSellForm()
    {
        $conditions = ItemCondition::orderBy("sort_no")->get();
        $categories = PrimaryCategory::orderBY("sort_no")->get();
        return view("sell", compact("conditions", "categories"));
    }
}
