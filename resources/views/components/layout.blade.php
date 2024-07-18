<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('pageTitle')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>

    <!-- Styles -->
</head>
<body class="font-sans antialiased dark:bg-black dark:text-white/50">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Portal das Cartas</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                @if(session('token') == null)
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('login')}}">Login</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('logout')}}">Logout</a>
                    </li>
                @endif

                <li class="nav-item">
                    <a class="nav-link" href="{{route('home')}}">Planos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('associacao')}}">Associacao</a>
                </li>
                @if(session('planoContratado')!=null)
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('parcelas')}}">Parcelas</a>
                        </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
{{$slot}}
<footer class="py-3 my-4">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li class="nav-item"><a href="{{route('home')}}" class="nav-link px-2 text-muted">Home</a></li>
    </ul>
    <p class="text-center text-muted">© 2024 Leituras de Tarô</p>
</footer>

</body>
</html>
