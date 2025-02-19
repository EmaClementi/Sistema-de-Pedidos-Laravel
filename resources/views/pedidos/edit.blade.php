@extends('layouts.app')

@section('title', __('messages.orders'))
@section('titulo', __('messages.modify_order'))

@section('content')

    <h1>{{ __('messages.edit_order')}}</h1>

    @if($errors->any())
    <div class="alert alert-danger">
        <h2>{{ __('messages.fix_errors')}}</h2>
        <ul>
            @foreach ($errors->all() as $error)
                <li>
                    {{$error}}
                </li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container mt-5">
    <h2 class="h2">{{ __('messages.order_data')}}</h2>

    <form action="{{ route('pedidos.update', $pedido->id) }}" method="POST">
        @method('PUT')
        @csrf

        <div class="my-4">
            <div class="form-group">
            <label for="cliente_id">{{ __('messages.client')}}:</label>
            <select id="nombre" name="nombre" class="form-control" disabled>
                <option value="{{ old('nombre', $pedido->cliente->nombre) }}">
                    {{ $pedido->cliente->nombre }}
                </option>
            </select>
            </div>
            
            <div class="form-group">
                <label for="fecha">{{ __('messages.date')}}:</label>
                <input type="date" name="fecha" id="fecha"  min="2010-01-01" class="form-control" value="{{old('fecha', $pedido->fecha ?? '')}}" required>
            </div>
        
            <div class="form-group">
                <label for="forma_de_pago">{{ __('messages.payment_method')}}:</label>
                <select name="forma_de_pago" id="forma_de_pago" class="form-control">
                    @foreach ($formasDePago as $forma)
                        <option value="{{ $forma }}" {{ $pedido->forma_de_pago == $forma ? 'selected' : '' }}>
                            {{ $forma }}
                        </option>
                    @endforeach
                </select>
            
            </div> 
        </div>

    
        <h2 class="h2">{{ __('messages.available_dishes')}}</h2>

        <div class="table-responsive" style="max-height: 300px; overflow-y: auto;">
            <table class="table">
                <thead>
                    <tr>
                        <th>{{ __('messages.dishes')}}</th>
                        <th>{{ __('messages.price')}}</th>
                        <th>{{ __('messages.quantity')}}</th>
                        <th>{{ __('messages.select')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($platos as $plato)
                        <tr>
                            <td>{{ $plato->nombre }}</td>
                            <td>${{ $plato->precio }}</td>
                            
                                @php
                                    $detallePedido = $detallePedidos->firstWhere('plato_id', $plato->id);
                                @endphp
                            
                            <td>
                                <input type="number" name="cantidades[{{ $plato->id }}]" 
                                       value="{{ $detallePedido ? $detallePedido->cantidad : 1 }}" 
                                       min="1" 
                                       class="form-control cantidad-input"
                                       style="width: 60px"
                                       {{ $detallePedido ? '' : 'disabled' }}>
                            </td>
                            <td>
                                <input type="checkbox" name="platos[]" value="{{ $plato->id }}" 
                                       class="plato-selector" 
                                       {{ $detallePedido ? 'checked' : '' }} style="width: 2rem; height: 2rem">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            document.querySelectorAll('.plato-selector').forEach(checkbox => {
                                checkbox.addEventListener('change', function () {
                                    let inputCantidad = this.closest('tr').querySelector('.cantidad-input');
                                    inputCantidad.disabled = !this.checked;
                                    if (this.checked) {
                                        inputCantidad.value = 1;
                                    }
                                });
                            });
                        });
                    </script>
            </table>
            
        </div>
        <h3>{{ __('messages.total')}} ${{$pedido->total}}</h3>

    
        <button type="submit" class="btn btn-primary">{{ __('messages.modify_order')}}</button>
        
    </form>

    <div class="text-center">
        <a href="{{ route('pedidos.index') }}">{{ __('messages.back_to_orders') }}</a>
    </div>
    
@endsection