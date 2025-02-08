<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>@yield('title', 'titulo')</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    @stack('styles')
</head>
<body>
<!--?lang=en// {( url('locale/en'))}-->
    <nav>
        <x-navbar />
        <div class="d-flex justify-content-end gap-2 my-3">
            <a href="{{ route('change.language', ['lang' => 'es']) }}" class="btn btn-secondary mb-3">
                <img src="{{ asset('img/banderaArg.png') }}" alt="Español" width="30">
            </a>
            <a href="{{ route('change.language', ['lang' => 'en']) }}" class="btn btn-secondary mb-3">
                <img src="{{ asset('img/banderaEEUU.png') }}" alt="English" width="30">
            </a>
        </div>
    </nav>
    
    <h1 class="titulo-pagina">@yield('titulo', 'titulo')</h1>
    
    <main class="container-fluid">
        @yield('content')
    </main>

    <footer>
        <x-footer />
    </footer>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>