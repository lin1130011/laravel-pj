@extends('layouts.back')
@section('content')
    <div class="container mt-5">
        <h1 class="text-center">歡迎 {{ Auth::user()->name }}</h1>
        <h2 class="text-center">請從上方導覽列選擇功能</h2>
    </div>
@endsection
