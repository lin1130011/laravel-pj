@extends('layouts.home')
{{-- <img style="width:300px;height:300px" src="{{ asset('images/' . $da['img']) }}" alt=""> --}}
@section('content')
    @auth
        {{ Auth::user()->name }}
        <div class="container mt-5">
            {{-- 招牌 --}}
            <div class="row">
                @foreach ($menus as $menu)
                @endforeach
                <div class="col-12">
                    <img class="w-100" src="{{ asset('images/' . $menu['img']) }}" alt="">
                </div>
            </div>

            {{-- 商品 --}}
            <div class="row">
                @foreach ($items as $item)
                    <div class="col-12 col-lg-4 mt-3">
                        <div class="card" style="width:400px">
                            <img style="width: 400px;height:400px;" src="{{ asset('images/' . $item['img']) }}"
                                alt="Card image">
                            <div class="card-body">
                                <h4 class="card-title">{{ $item['name'] }}</h4>
                                <p class="card-text">{{ $item['text'] }}
                                </p>
                                <a href="{{ route('carts.show', $item['id']) }}" class="btn btn-lg btn-success">購買</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <h1>尚未登入</h1>
        <p>請先登入</p>
    @endauth
    </div>
@endsection
