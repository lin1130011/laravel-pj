@extends('layouts.home')
@section('content')
    <div class="container">
        @auth
        @else
            <h1>尚未登入</h1>
            <p>請先登入</p>
        @endauth
    </div>
@endsection
