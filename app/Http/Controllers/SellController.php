<?php

namespace App\Http\Controllers;

use APP\Http\Requests\SellRequest;
use App\Models\Item;
use App\Models\ItemCondition;
use App\Models\PrimaryCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SellController extends Controller
{
    public function showSellForm()
    {
        $conditions = ItemCondition::orderBy("sort_no")->get();
        // $categories = PrimaryCategory::orderBY("sort_no")->get();
        $categories = PrimaryCategory::query()->with([
            "secondaryCategories" => function ($query) {
                $query->orderBy("sort_no");
            }
        ])->orderBy("sort_no")->get();

        return view("sell", compact("conditions", "categories"));
    }

    public function sellItem(Request $request)
    {
        $user = Auth::user();

        $item = new Item();
        $item->seller_id = $user->id;
        $item->name = $request->name;
        $item->description = $request->description;
        $item->secondary_category_id = $request->category;
        $item->item_condition_id = $request->condition;
        $item->price = $request->price;
        $item->state = Item::STATE_SELLING;

        $item->save();
        return redirect()->back()->with("status", "商品を出品しました");

    }
}
