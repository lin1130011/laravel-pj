@extends('layouts.back')
@section('title')
    <h3 class="text-center">商品首頁</h3>
@endsection
@section('content')
    <div class="container mt-5 text-center align-middle">
        <div class="row text-end">
            <div class="col-12 col-lg-12">
                <button onclick="location.href='{{ route('items.create') }}'" class="btn btn-lg btn-success">新增</button>
            </div>
        </div>
        <div class="row d-flex align-items-center mt-5">
            <div class="col-2">商品圖片</div>
            <div class="col-2">商品名稱</div>
            <div class="col-2">商品介紹</div>
            <div class="col-2">商品價格</div>
            <div class="col-2">顯示</div>
            <div class="col-2">編輯</div>
        </div>
        @foreach ($items as $item)
            <div class="row d-flex align-items-center mb-3">
                <div class="col-2">
                    <img style="width: 200px; height: 150px;" src="{{ asset('images/' . $item['img']) }}" alt="">
                </div>
                <div class="col-2">
                    {{ $item['name'] }}
                </div>
                <div class="col-2">
                    {{ $item['text'] }}
                </div>
                <div class="col-2">
                    {{ $item['price'] }}
                </div>
                <div class="col-2">
                    {{ $item['sh'] == 1 ? '顯示' : '不顯示' }}
                </div>
                <div class="col-2">
                    <button onclick="location.href='{{ route('items.edit', $item['id']) }}'"
                        class="btn btn-lg btn-info">編輯</button>
                </div>
            </div>
        @endforeach
        <div class="d-flex justify-content-center mt-3">
            <ul class="pagination">
                {{ $items->links() }}
            </ul>
        </div>
    </div>
@endsection
