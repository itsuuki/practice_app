<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Item;

use App\Models\Image;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return view('item/index', ['items' => $items]);
    }

    public function create()
    {
        return view('admin/items/create');
    }

    public function store(Request $request)
    {
        // header('Content-Type: text/html; charset=UTF-8');
        $value = new Item;

        // $i = 0;

        $value->item_name = $request->input('item_name');

        $value->item_price = $request->input('item_price');

        $value->detail = $request->input('detail');

        $value->delivery = $request->input('delivery');

        $value->quantity = $request->input('quantity');

        // $values = mb_convert_encoding($value, "UTF-8");

        $value->save();

        // foreach ($request->nums as $val) {
        //     if ($request->img !== null) {
                $img = new Image;

                $img->image = $request->img->store('images', 'public');

                $img->item_id = $value->id;

                $img->save();
        //     }
        //     $i++;
        // }

        return redirect('admin/');
    }

    public function search(Request $request){
        $keyword = $request->input('keyword');
        $query = Item::all();
        $query->where('item_name','like','%'.$keyword.'%');
        $items = $query->get();
        echo var_dump($items);
    }
}
