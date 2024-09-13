@extends('layouts.back')
@section('title')
    <h3 class="text-center">編輯菜單</h3>
@endsection
@section('content')
    <div class="container">
        <form action="{{ route('menus.update', $id = $menu['id']) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row d-flex align-items-center mb-3 text-center">
                <div class="col-3">圖片</div>
                <div class="col-3">顯示</div>
                <div class="col-3">刪除</div>
                <div class="col-3">更換圖片</div>
            </div>
            <div class="row d-flex align-items-center mb-3 text-center">
                <div class="col-3">
                    <img style="width: 300px; height: 150px;" src="{{ asset('images/' . $menu['img']) }}" alt="">
                </div>
                <div class="col-3">
                    <input type="radio" name="sh" id=""
                        value=""{{ $menu['sh'] == 1 ? 'checked' : '' }}>
                </div>
                <div class="col-3">
                    <input type="radio" name="del" id="" value="">
                </div>
                <div class="col-3">
                    <input class="" type="file" name="img" value="更換圖片">
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <button class="btn btn-lg btn-info" type="submit">確認修改</button>
                </div>
            </div>
        </form>
    </div>
@endsection
