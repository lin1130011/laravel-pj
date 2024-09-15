@extends('layouts.back')
@section('title')
    <h3 class="text-center">編輯商品</h3>
@endsection
@section('content')
    <div class="container mt-5 text-center align-middle">
        <form action="{{ route('items.update', $id = $item['id']) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row d-flex align-items-center mb-3 text-center">
                <div class="col-2">圖片</div>
                <div class="col-2">修改商品名稱</div>
                <div class="col-2">修改商品介紹</div>
                <div class="col-2">修改價格</div>
                <div class="col-1">顯示</div>
                <div class="col-1">刪除</div>
                <div class="col-2">更換圖片</div>
            </div>
            <div class="row d-flex align-items-center mb-3 text-center">
                <div class="col-2">
                    <img style="width: 200px; height: 150px;" src="{{ asset('images/' . $item['img']) }}" alt="">
                </div>
                <div class="col-2">
                    <input type="text" name="name" id="" value="{{ $item['name'] }}">
                </div>
                <div class="col-2">
                    <input type="text" name="text" id="" value="{{ $item['text'] }}">
                </div>
                <div class="col-2">
                    <input type="number" name="price" id="" value="{{ $item['price'] }}">
                </div>
                <div class="col-1">
                    <input type="checkbox" name="sh" id=""
                        value=""{{ $item['sh'] == 1 ? 'checked' : '' }}>
                </div>
                <div class="col-1">
                    <input type="checkbox" name="del" id="" value="">
                </div>
                <div class="col-2">
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
