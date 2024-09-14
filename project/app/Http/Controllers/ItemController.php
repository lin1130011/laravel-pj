<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $item = new Item();
        $data = $item::paginate(5);
        return view("item.index", ['items' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("item.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $item = new Item();
        $file = $request->file("img");
        $file_name = $file->getClientOriginalName();
        $target_path = public_path("images");
        if ($file->move($target_path, $file_name)) {
            $item->img = $file_name;
            $item->sh = 0;
            $item->text = $request->text;
            $item->price = $request->price;
        } else {
            return back()->with("error", "上傳失敗");
        }
        // dd($request);
        $item->save();
        return back()->with("success", "上傳成功");
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        //
    }
}
