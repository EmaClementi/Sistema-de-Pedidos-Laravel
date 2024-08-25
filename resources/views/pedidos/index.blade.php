<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Clientes</title>
</head>
<body>
    
    <h1>Todos los Pedidos</h1>


    <a href="{{route('pedidos.create')}}">Nuevo Pedido</a>
    <ul>
        @foreach ($pedidos as $pedido)
            <li>
                <a href="{{route('pedidos.show', $pedido->id)}}">Pedido con ID: {{ $pedido->id}}</a>
                
            </li>
            <hr>
        @endforeach

    </ul>
    <a href="{{route('home')}}">Volver al Inicio</a>
    <br>
    <br>
    {{ $pedidos->links()}}
    
</body>
</html>    
