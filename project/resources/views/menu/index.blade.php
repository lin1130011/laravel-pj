@extends('layouts.back')
@section('title')
    <h3 class="text-center">菜單首頁</h3>
@endsection
@section('content')
    <div class="container mt-5 text-center align-middle">
        <div class="row text-end">
            <div class="col-12 col-lg-12">
                <button onclick="location.href='{{ route('menus.create') }}'" class="btn btn-lg btn-success">新增</button>
            </div>
        </div>
        <div class="row d-flex align-items-center mt-5">
            <div class="col-4">圖片</div>
            <div class="col-4">顯示</div>
            <div class="col-4">編輯</div>
        </div>
        @foreach ($menus as $item)
            <div class="row d-flex align-items-center mb-3">
                <div class="col-4">
                    <img style="width: 300px; height: 150px;" src="{{ asset('images/' . $item['img']) }}" alt="">
                </div>
                <div class="col-4">
                    {{ $item['sh'] == 1 ? '顯示' : '不顯示' }}
                </div>
                <div class="col-4">
                    <button onclick="location.href='{{ route('menus.edit', $menu = $item['id']) }}'"
                        class="btn btn-lg btn-info">編輯</button>
                </div>
            </div>
        @endforeach

    </div>
@endsection
