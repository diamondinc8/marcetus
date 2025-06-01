<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
    </script>
    <title>Партер - регистрация</title>
</head>

<!DOCTYPE html>
<html lang="en">


<body class="bg-light">

    <form action="{{ route('seller.registration') }}" method="POST">
        @csrf
        <div class="container d-flex justify-content-center align-items-center min-vh-100 text-center">
            <input type="hidden" name="founder_id" value="{{ Auth::id() }}">
            <div class="w-100" style="max-width: 500px;">
                <h2 class="text-center">Регистрация магазина</h2>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Название: </span>
                    <input type="text" class="form-control" placeholder="Название" aria-label="Username"
                        aria-describedby="basic-addon1" name="title">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon2">ИНН:</span>
                    <input type="text" class="form-control" placeholder="ИНН" aria-label="Recipient’s username"
                        aria-describedby="basic-addon2" name="tin">
                </div>

                <button type="submit" class="btn btn-primary">Создать</button>
            </div>
        </div>
    </form>

</body>

</html>


</html>
