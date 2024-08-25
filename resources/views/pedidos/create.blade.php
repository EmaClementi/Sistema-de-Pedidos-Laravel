@extends('layouts.app')

@section('title', 'Nuevo Pedido')
    
@section('content')
<h1>Formulario para crear un Pedido</h1>

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

{{-- @error('cliente_id')
    <p>{{$message}}</p>
@enderror --}}

<h2>Datos del Pedido</h2>

<form action="{{route('pedidos.store')}}" method="POST">
    @csrf

    <div>
        <label>Cliente:</label>
        <select name="cliente_id">
            @foreach($clientes as $cliente)
                <option value="{{ $cliente->id }}">{{ $cliente->nombre }} {{ $cliente->apellido }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label>Fecha:</label>
        <input type="date" name="fecha">
    </div>

    <div>
        <label>Forma de Pago:</label>
        <input type="text" name="forma_de_pago">
    </div>

    <br>
    <hr>
    <h2>Contenido del Pedido</h2>

    @foreach($platos as $plato)
        <div>
            <label>
                <input type="checkbox" name="platos[]" value="{{ $plato->id }}">
                {{ $plato->nombre }} - ${{ $plato->precio }}
            </label>
            <br>
            <label>Cantidad:
                <input type="number" name="cantidades[{{ $plato->id }}]" value="1" min="1">
            </label>
        </div>
    @endforeach

    <br>
    
    <button type="submit">Crear Pedido</button>
</form>
@endsection
