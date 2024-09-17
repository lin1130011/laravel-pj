@extends('layouts.home')
@section('title')
    <h3 class="text-center">查看購物車</h3>
@endsection

@if (empty($cart))
    @section('content')
        <h2>購物車為空</h2>
    @endsection
@else
    @section('content')
        @if (empty($cart))
            <h2>購物車為空</h2>
            {{ exit() }}
        @endif
        <div class="container mt-5 text-center align-middle">
            <form action="">
                <div class="row d-flex align-items-center mb-3 text-center">
                    <div class="col-2">圖片</div>
                    <div class="col-2">商品名稱</div>
                    <div class="col-2">商品介紹</div>
                    <div class="col-2">商品單價</div>
                    <div class="col-1">數量</div>
                    <div class="col-1">總價</div>
                    <div class="col-2">編輯</div>
                </div>
                @php
                    $final_price = 0;
                @endphp
                @foreach ($cart as $key => $item)
                    <div class="row d-flex align-items-center mb-3 text-center">
                        <div class="col-2">
                            <img style="width: 200px; height: 150px;" src="{{ asset('images/' . $item['img']) }}"
                                alt="">
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
                        <div class="col-1">
                            {{ $item['quantity'] }}
                        </div>
                        <div class="col-1">
                            {{ $item['total_price'] }}
                        </div>
                        <div class="col-2">
                            <button class="btn btn-lg btn-info">編輯</button>
                        </div>
                    </div>
                    @php
                        $final_price += $item['total_price'];
                    @endphp
                @endforeach
                <hr>
                <div>
                    總計:{{ $final_price }}
                </div>
            </form>
        </div>
    @endsection
@endif
