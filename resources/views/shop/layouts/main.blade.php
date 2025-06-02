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

<body class = "highlight">

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid container">
            <a class="navbar-brand" href="{{ route('index') }}">Маркетус</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <form class="d-flex flex-grow-1 me-3 ms-3" role="search">
                <input class="form-control me-2" type="search" placeholder="Искать по названию или артиклу"
                    aria-label="Search" />
                <button class="btn btn-outline-success" type="submit">Найти</button>
            </form>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">

                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Адреса</a>
                    </li>
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Войти') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Зарегистрироваться') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item">
                            <a href="#" class="nav-link active">Доставки</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link active">Избранное</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a href="{{ route('lk.index') }}" class="dropdown-item">Открыть профиль</a>
                                <a href="{{ route('seller.index') }}" class="dropdown-item">Продавайте</a>
                                <a href="#" class="dropdown-item">Работайте</a>

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Выйти') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                    <li class="nav-item">
                        @auth
                            <a href="{{ route('cart.show', Auth::id()) }}" class="nav-link">Корзина</a>
                        @else
                        @endauth
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-3">

        @yield('content')
    </div>
</body>

</html>
