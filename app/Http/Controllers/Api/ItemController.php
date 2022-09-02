<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{

    public function index()
    {
        //listeleme için
        $items = Item::all();
        return $items;
    }


    public function store(Request $request)
    {
        //post işlemi olacak. Store'da kaydetme işlemi olacak.
        $item = new Item();
        $item->name = $request->name;
        $item->desc = $request->desc;
        $item->quantity = $request->quantity;

        $item->save();
        return response()->json(['message', 'Eleman Kaydedildi.']);
    }


    public function show($id)
    {
        //id parametresi alacak ve ilgili item'ın detayını sergileyebiliriz.
        $item = Item::find($id);
        return $item;
    }


    public function update(Request $request, $id)
    {
        $item = Item::findOrFail($request->id);
        $item->name = $request->name;
        $item->desc = $request->desc;
        $item->quantity = $request->quantity;

        $item->save();
        return $item;
    }


    public function destroy($id)
    {
        //silme işlemi için kullanılacak
        $item = Item::destroy($id);
        return response()->json(['message', 'Silme Başarılı.']);
    }
}
