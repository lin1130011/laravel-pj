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
            $item->sh = 1;
            $item->text = $request->text;
            $item->price = $request->price;
            $item->name = $request->name;
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
        return view("item.edit", ['item' => $item]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        if ($request->has('del')) {
            // 如果用户选择了删除，删除此菜单
            $item->delete();
            return redirect()->route('items.index')->with('success', '菜單已刪除');
        }
        $item->sh = $request->has('sh') ? 1 : 0;
        if ($request->hasFile('img')) {
            // 获取文件
            $file = $request->file('img');
            // $fileName = time() . '_' . $file->getClientOriginalName();  使用时间戳防止重名
            $fileName = $file->getClientOriginalName();

            // 移动文件到 public/images 目录
            $file->move(public_path('images'), $fileName);

            // 更新菜单的图片路径
            $item->img = $fileName;
        }
        $item->text = $request->text;
        $item->price = $request->price;
        // 保存更新后的菜单
        $item->save();

        return redirect()->route('items.index')->with('success', '菜單已更新');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        //
    }
}
