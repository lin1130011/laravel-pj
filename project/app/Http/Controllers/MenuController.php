<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menu = new Menu();
        $data = $menu->all();
        return view("menu.index", ['menus' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("menu.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $menu = new Menu();
        $file = $request->file('img');
        $file_name = $file->getClientOriginalName();
        $target_path = public_path("images");
        if ($file->move($target_path, $file_name)) {
            $menu->img = $file_name;
            $menu->sh = 0;
        } else {
            // 处理文件移动失败的情况
            return back()->with('error', '文件上传失败');
        }
        $menu->save();
        return back()->with('success', '上傳成功');
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        return view("menu.edit", ['menu' => $menu]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {

        if ($request->has('del')) {
            // 如果用户选择了删除，删除此菜单
            $menu->delete();
            return redirect()->route('menus.index')->with('success', '菜單已刪除');
        }
        $menu->sh = $request->has('sh') ? 1 : 0;
        if ($request->hasFile('img')) {
            // 获取文件
            $file = $request->file('img');
            // $fileName = time() . '_' . $file->getClientOriginalName();  使用时间戳防止重名
            $fileName = $file->getClientOriginalName();

            // 移动文件到 public/images 目录
            $file->move(public_path('images'), $fileName);

            // 更新菜单的图片路径
            $menu->img = $fileName;
        }

        // 保存更新后的菜单
        $menu->save();

        return redirect()->route('menus.index')->with('success', '菜單已更新');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        //
    }
}
