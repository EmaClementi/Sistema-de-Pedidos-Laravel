<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Coders')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- fonteawesome --}}
    {{-- tipografia --}}

    @stack('css')
</head>
<body>

    <header></header>

    @yield('content')

    <footer></footer>
    
</body>
</html>