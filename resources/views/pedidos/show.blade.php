@extends('layouts.app')

@section('title', __('messages.orders'))

@section('titulo', __('messages.order_details'))

@section('content')

    <div class="container mt-4">
        <a href="{{route('pedidos.index')}}" class="btn btn-secondary mb-3">{{ __('messages.back_to_orders')}}</a>

        <div class="card">
            <div class="card-header">
                <h3>Detalles del Pedido{{ __('messages.back_to_orders')}}</h3>
            </div>
            <div class="card-body">
                <p><strong>{{ __('messages.client_name')}}:</strong> {{ $pedido->cliente->nombre }}</p>
                <p><strong>{{ __('messages.date')}}:</strong> {{$pedido->fecha}}</p>
                <p><strong>{{ __('messages.payment_method')}}:</strong> {{$pedido->forma_de_pago }}</p>
                <p><strong>{{ __('messages.total')}}:</strong> {{ $pedido->total }}</p>
                <p><strong>{{ __('messages.status')}}:</strong> {{ $pedido->estado }}</p>

                <table class="table table-fixed">
                    <thead>
                        <tr>
                            <th>{{ __('messages.dishes')}}</th>
                            <th>{{ __('messages.description')}}</th>
                            <th>{{ __('messages.quantity')}}</th>
                            <th>{{ __('messages.price')}}</th>
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
                    <strong><p class="me-3">{{ __('messages.total')}}:</p></strong>
                    <p>${{ $pedido->total}}</p>
                </div>


            </div>
            <div class="card-footer">
                <a href="{{route('pedidos.edit', $pedido->id)}}" class="btn btn-warning">{{ __('messages.edit_order')}}</a>

                <form action="{{route('pedidos.destroy', $pedido->id)}}" method="POST" class="d-inline-block float-end">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">{{ __('messages.delete_order')}}</button>
                </form>
            </div>
        </div>
    </div>

@endsection