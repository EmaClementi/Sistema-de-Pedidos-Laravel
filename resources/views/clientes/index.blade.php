<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Clientes</title>
</head>
<body>
    
    <h1>Todos los Clientes</h1>

    <a href="{{route('clientes.create')}}">Nuevo Cliente</a>

    <ul>
        @foreach ($clientes as $cliente)
            <li>
                <a href="{{route('clientes.show', $cliente->id)}}"> Cliente con ID: {{ $cliente->id }}</a>
                <hr>
            </li>
        @endforeach  
    </ul>
    <a href="{{route('home')}}">Volver al Inicio</a>
    <br>
    <br>
    {{ $clientes->links()}}
    
</body>
</html>