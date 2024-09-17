<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class Cartcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cart = session()->get('cart', []);

        // dd($cart);
        return view('cart.index', compact('cart'));
    }


    public function add(Request $request)
    {
        // dd($request);
        $id = $request->id;
        $cart = session()->get('cart', []);
        $item = Item::where("id", $id)->first();
        // dd($item);

        $cart[] = [
            'img' => $item->img,
            'name' => $item->name,
            'text' => $item->text,
            'price' => $item->price,
            'quantity' => $request->quantity,
            'total_price' => $request->total_price
        ];


        // 更新 session 中的购物车数据
        session()->put('cart', $cart);

        return redirect()->route("carts.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = Item::where('id', $id)->first();
        // $item = Item::find($id);
        return view("cart.show", ['item' => $item]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        dd($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
