<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>


<body>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
            <ul class="navbar-nav w-100">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('home') }}">返回首頁</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile.edit') }}">編輯個人資料</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">查看訂單</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                @if (session('login') == 1)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('menus.index') }}">菜單管理</a>
                    </li>
                @else
                @endif
                <li class="nav-item ms-auto">
                    <form action="{{ route('logout') }}" method="post" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>
    <div class="title mt-5">
        @yield('title');
    </div>
    <div class="container">
        @yield('content')
    </div>

</body>

</html>
