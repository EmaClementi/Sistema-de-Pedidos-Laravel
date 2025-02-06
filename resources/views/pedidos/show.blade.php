@extends('layouts.app')

@section('title', 'Pedido')

@section('content')

    <a href="{{route('pedidos.index')}}">Volver a pedidos</a>

    <form action="{{route('pedidos.update', $pedido->id)}}" method="POST">
        @method("PUT")
        @csrf
        <label>Nombre del Cliente {{ $pedido->cliente->nombre }}</label>
        <br>
        <label>Fecha <input type="date" name="fecha" value="{{ old('fecha', $pedido->fecha) }}"></label>
        <br>
        <label>Forma de Pago <input type="text" name="forma_de_pago" value="{{ old('forma_de_pago', $pedido->forma_de_pago) }}"></label>
        <br>
        <label>Total <input type="number" name="total" value="{{ old('total', $pedido->total) }}"></label>
        <br>
        <label>Estado <input type="text" name="estado" value="{{ old('estado', $pedido->estado) }}"></label>
        <br>
        <button type="submit">Modificar Pedido</button>
    </form>

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

@endsection