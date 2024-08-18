<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="{{route('pedidos.index')}}">Volver a pedidos</a>

    <h1>Id del Pedido: {{ $pedido->id}}</h1> 
    <p>Id del Cliente: {{ $pedido->cliente_id}}</p> 
    <p>Fecha del Pedido: {{ $pedido->fecha}}</p> 
    <p>Forma de Pago: {{ $pedido->forma_de_pago}}</p> 
    <p>Total: {{ $pedido->total}}</p> 
    <p>Estado del Pedido: {{ $pedido->estado}}</p>

    <h2>Platos:</h2>
    <ul>
        @foreach ($pedido->detalle_pedido as $detalle)
            <li>
                {{ $detalle->plato->nombre }} - Cantidad: {{ $detalle->cantidad }} - Precio: ${{ $detalle->plato->precio }}
            </li>
        @endforeach
    </ul>

    <p>Total: ${{ $pedido->total }}</p>
    
    <a href="{{route('pedidos.edit', $pedido->id)}}">Editar Pedido</a>

    <form action="{{route('pedidos.destroy', $pedido->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Eliminar Pedido</button>
    </form>

</body>
</html>