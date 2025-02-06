@extends('layouts.app')

@section('title', 'Pedido')

@section('titulo', 'Detalles del Pedido')

@section('content')

    <div class="container mt-4">
        <a href="{{route('pedidos.index')}}" class="btn btn-secondary mb-3">Volver a pedidos</a>

        <div class="card">
            <div class="card-header">
                <h3>Detalles del Pedido</h3>
            </div>
            <div class="card-body">
                <p><strong>Nombre del Cliente:</strong> {{ $pedido->cliente->nombre }}</p>
                <p><strong>Fecha:</strong> {{$pedido->fecha}}</p>
                <p><strong>Forma de Pago:</strong> {{$pedido->forma_de_pago }}</p>
                <p><strong>Total:</strong> {{ $pedido->total }}</p>
                <p><strong>Estado</strong> {{ $pedido->estado }}</p>

                <table class="table table-fixed">
                    <thead>
                        <tr>
                            <th>Plato</th>
                            <th>Descripcion</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($pedido->detalle_pedido as $detalle)
                            <tr>
                                <td>{{ $detalle->plato->nombre }}</td>
                                <td>{{ $detalle->plato->descripcion }}</td>
                                <td>{{ $detalle->cantidad }}</td>
                                <td>${{ $detalle->plato->precio }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                <div class="d-flex justify-content-end fs-3" style="width: 93%;">
                    <strong><p class="me-3">Total:</p></strong>
                    <p>${{ $pedido->total}}</p>
                </div>


            </div>
            <div class="card-footer">
                <a href="{{route('pedidos.edit', $pedido->id)}}" class="btn btn-warning">Editar Pedido</a>

                <form action="{{route('pedidos.destroy', $pedido->id)}}" method="POST" class="d-inline-block float-end">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar Pedido</button>
                </form>
            </div>
        </div>
    </div>

@endsection