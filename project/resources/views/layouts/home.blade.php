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
                    @auth
                        <a class="nav-link active" href="{{ route('back') }}">查看後台</a>
                    @else
                        <a class="nav-link active" href="{{ route('login') }}">尚未登入</a>
                    @endauth
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Active</a>
                </li>
                <li class="nav-item">
                    @auth
                        <a class="nav-link" href="#">menu</a>
                    @else
                        <a class="nav-link" href="#">Link</a>
                    @endauth
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                @auth
                    <li class="nav-item ms-auto">
                        <form action="{{ route('logout') }}" method="post" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-danger">Logout</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item ms-auto">
                        <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                        <a href="{{ route('register') }}" class="btn btn-info">註冊</a>
                    </li>

                @endauth
            </ul>

        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

</body>

</html>
