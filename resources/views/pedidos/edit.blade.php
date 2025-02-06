@extends('layouts.app')

@section('title', 'Pedidos')
@section('titulo', 'Modificar Pedido')

@section('content')

    <h1>Formulario para Editar un Pedido</h1>

    @if($errors->any())
    <div>
        <h2>Errores:</h2>
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
    <h2 class="h2">Datos del Pedido</h2>

    <form action="{{ route('pedidos.update', $pedido->id) }}" method="POST">
        @method('PUT')
        @csrf

        <div class="my-4">
            <div class="form-group">
            <label for="cliente_id">Cliente:</label>
            <select id="nombre" name="nombre" class="form-control" disabled>
                <option value="{{ old('nombre', $pedido->cliente->nombre) }}">
                    {{ $pedido->cliente->nombre }}
                </option>
            </select>
            </div>
            
            <div class="form-group">
                <label for="fecha">Fecha:</label>
                <input type="date" name="fecha" id="fecha" class="form-control" value="{{old('nombre', $pedido->fecha)}}" required>
            </div>
        
            <div class="form-group">
                <label for="forma_de_pago">Forma de Pago:</label>
                <select name="forma_de_pago" id="forma_de_pago" class="form-control">
                    @foreach ($formasDePago as $forma)
                        <option value="{{ $forma }}" {{ $pedido->forma_de_pago == $forma ? 'selected' : '' }}>
                            {{ $forma }}
                        </option>
                    @endforeach
                </select>
            
            </div> 
        </div>

    
        <h2 class="h2">Platos disponibles</h2>

        <div class="table-responsive" style="max-height: 300px; overflow-y: auto;">
            <table class="table">
                <thead>
                    <tr>
                        <th>Plato</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($platos as $plato)
                        <tr>
                            <td>{{ $plato->nombre }}</td>
                            <td>${{ $plato->precio }}</td>
                            <td>
                                <!-- Buscamos si el plato existe en los detallePedidos y mostramos su cantidad -->
                                @php
                                    $detallePedido = $detallePedidos->firstWhere('plato_id', $plato->id);
                                @endphp
        
                                <input type="number" name="cantidades[{{ $plato->id }}]" 
                                       value="{{ $detallePedido ? $detallePedido->cantidad : 0 }}" 
                                       min="1" 
                                       class="form-control" 
                                       style="width: 60px"
                                       {{ $detallePedido ? '' : 'disabled' }}>
        
                                <input type="checkbox" name="platos[]" value="{{ $plato->id }}" 
                                       class="plato-selector" 
                                       {{ $detallePedido ? 'checked' : '' }}>
                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
            
        </div>
        <h3>Total ${{$pedido->total}}</h3>

    
        <button type="submit" class="btn btn-primary">Modificar Pedido</button>
    </form>
    
@endsection