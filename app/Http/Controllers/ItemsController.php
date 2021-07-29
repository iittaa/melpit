<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemsController extends Controller
{
    public function showItems(Request $request)
    {
        $items = Item::orderByRaw( "FIELD(state, '" . Item::STATE_SELLING . "', '" . Item::STATE_BOUGHT . "')" )
        ->orderBy('id', 'DESC')
        ->paginate(10);

        // dd($items);

        return view("items.items", compact("items"));
    }

    public function showItemDetail(Item $item)
    {
        return view("items.item_detail", compact("item"));
    }
}
