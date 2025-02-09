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
        <form action="{{ route('locale.change') }}" method="POST">
            @csrf
            <select name="locale" onchange="this.form.submit()">
                <option value="en"{{ app()->getLocale() == 'en' ? ' selected' : '' }}>English</option>
                <option value="es"{{ app()->getLocale() == 'es' ? ' selected' : '' }}>Español</option>
            </select>
        </form>
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