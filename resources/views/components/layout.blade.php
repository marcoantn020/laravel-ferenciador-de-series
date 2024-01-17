<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? '' }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid p-2">
            <a class="navbar-brand" href="{{ route('series.index') }}">Home</a>

            @auth
                <a class="navbar-brand" href="{{ route('logout') }}">Sair</a>
            @endauth

            @guest
                <a class="navbar-brand" href="{{ route('login') }}">Login</a>
            @endguest
        </div>
    </nav>

<div class="container">
    <h1>{{ $title ?? '' }}</h1>

    @isset($messageSuccess)
        <div class="alert alert-success">
            {{ $messageSuccess }}
        </div>
    @endisset

    {{ $slot }}
</div>

</body>
</html>
