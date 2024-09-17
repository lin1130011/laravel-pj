@extends('layouts.home')
@section('title')
    <h3 class="text-center">購買商品</h3>
@endsection
@section('content')
    <div class="container mt-5 text-center align-middle">
        <form action="{{ route('add_cart') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row d-flex align-items-center mb-3 text-center">
                <div class="col-2">圖片</div>
                <div class="col-2">商品名稱</div>
                <div class="col-2">商品介紹</div>
                <div class="col-2">商品單價</div>
                <div class="col-2">選擇數量</div>
                <div class="col-2">總價</div>
            </div>
            <div class="row d-flex align-items-center mb-3 text-center">
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
                    <input type="number" name="quantity" id="quantity" value="1" min="1" required>
                </div>
                <div class="col-2">
                    <input type="number" name="total_price" id="total_price" value="{{ $item['price'] }}" readonly>
                    <input type="hidden" name="id" value="{{ $item['id'] }}">
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <button class="btn btn-lg btn-info" type="submit">加入購物車</button>
                </div>
            </div>
        </form>
    </div>
    <script>
        $(document).ready(function() {
            $('#quantity').on('input', function() {
                var quantity = $(this).val();
                var price = {{ $item['price'] }};
                var totalPrice = quantity * price;
                $('#total_price').val(totalPrice);
            });
        });
    </script>
@endsection
