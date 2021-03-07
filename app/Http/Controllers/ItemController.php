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
        $data = "https://www.googleapis.com/books/v1/volumes?q=東野圭吾";
        $json = file_get_contents($data);
        $json_decode = json_decode($json);

        // jsonデータ内の『entry』部分を複数取得して、postsに格納
        $posts = $json_decode->items;
        // var_dump($posts);
        return view('item/index', ['items' => $items, 'posts' => $posts]);
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
        // $query = Item::all();
        $data = 'https://www.googleapis.com/books/v1/volumes?q='.'"$keyword"';
        // $query->where('item_name','like','%'.$keyword.'%');
        $json = file_get_contents($data);
        $json_decode = json_decode($json, true);
        
        $posts = $json_decode['items'];
        // dd($json_decode['items']);
        return view('item/index', ['posts' => $posts]);
        // var_export($posts);
        // $items = $query->get();
        // {{ optional($post)['title'] }}
        // [0]['volumeInfo']
    }
}
