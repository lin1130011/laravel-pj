@extends('layouts.back')
@section('title')
    <h3 class="text-center">新增商品</h3>
@endsection
@section('content')
    <div class="container mt-5 text-center align-middle">
        <form action="{{ route('items.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row d-flex align-item-center mb-3">
                <div class="col-3">上傳商品圖片</div>
                <div class="col-3">商品名稱</div>
                <div class="col-3">商品介紹</div>
                <div class="col-3">設定價格</div>
            </div>
            <div class="row d-flex align-item-center mb-3">
                <div class="col-3">
                    <input type="file" name="img" id="">
                </div>
                <div class="col-3">
                    <input type="text" name="name" id="">
                </div>
                <div class="col-3">
                    <input type="text" name="text" id="">
                </div>
                <div class="col-3">
                    <input type="number" name="price" id="">
                </div>
            </div>
            <div class="row text-center mb-3">
                <div class="col-12">
                    <button type="submit" class="btn btn-lg btn-success">新增商品</button>
                </div>
            </div>
        </form>
    </div>
@endsection
