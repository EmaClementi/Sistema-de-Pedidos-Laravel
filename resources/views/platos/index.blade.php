<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Todos los platos</h1>

    <a href="{{route('platos.create')}}">Nuevo Plato</a>
    <br>
    <br>
    @foreach ($platos as $plato)
        <li>
            <a href="{{route('platos.show', $plato->id)}}"> Plato con ID: {{ $plato->id }}</a>
            <hr>
        </li>
    @endforeach

    <a href="{{route('home')}}">Volver al Inicio</a>
    <br>
    <br>
    {{ $platos->links() }}

</body>
</html>