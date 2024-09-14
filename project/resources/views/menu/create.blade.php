@extends('layouts.back')
@section('title')
    <h3 class="text-center">新增菜單</h3>
@endsection
@section('content')
    <div class="container mt-5 text-center align-middle">
        <form action="{{ route('menus.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col">
                    需要上傳的圖片
                </div>
                <div class="col">
                    <input type="file" name="img" id="">
                </div>
            </div>
            <div>
                <button type="submit">送出</button>
            </div>
        </form>
    </div>
@endsection
