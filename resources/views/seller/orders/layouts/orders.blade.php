<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Noto+Serif+Dives+Akuru&family=Unbounded:wght@200..900&display=swap"
        rel="stylesheet">
    <title>@yield('title')</title>
    <style>
        .no-decorate {
            text-decoration: none;
        }

        .highlight {
            background-color: rgb(246, 246, 249);
            /* Цвет фона */
        }

        body {
            font-family: "Unbounded", sans-serif;
            font-optical-sizing: auto;
            font-weight: <weight>;
            /* например, 400 */
            font-style: normal;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid container">
            <a class="navbar-brand" href="#">@yield('seller')</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('all.goods') }}">Карточки
                            товаров</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('orders.new') }}">Заказы</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Продажи</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Что-то ещё (например сервисы)
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-top">
            <div class="container-fluid">
                <div class="d-flex w-100 justify-content-between">
                    <a class="nav-link text-center flex-fill" href="{{ route('orders.new') }}">Новые</a>
                    <a class="nav-link text-center flex-fill" href="#">На сборке</a>
                    <a class="nav-link text-center flex-fill" href="#">В доставке</a>
                    <a class="nav-link text-center flex-fill" href="#">Выполнены</a>
                </div>
            </div>
        </nav>
    </div>
    <div class="container">
        @yield('content')
    </div>
</body>

</html>
