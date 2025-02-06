@extends('layouts.app')

@section('title', 'Nuevo Cliente')

@section('titulo', 'Agregar Nuevo Cliente')

@section('content')

    @if($errors->any())
        <div>
            <h2>Errores:</h2>
            <ul>
                @foreach($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

<div class="container mt-5">
    <form action="{{ route('clientes.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del Cliente:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}">
        </div>

        <div class="mb-3">
            <label for="apellido" class="form-label">Apellido:</label>
            <input type="text" class="form-control" id="apellido" name="apellido" value="{{ old('apellido') }}">
        </div>

        <div class="mb-3">
            <label for="direccion" class="form-label">Direccion:</label>
            <input type="text" class="form-control" id="direccion" name="direccion" value="{{ old('direccion') }}" placeholder="Ej: Av. Siempre Viva 742" 
            pattern="[A-Za-z0-9\s,.-]+" >
        </div>

        <div class="mb-3">
            <label for="telefono" class="form-label">Telefono:</label>
            <input type="number" class="form-control" id="telefono" name="telefono" value="{{ old('telefono') }}">
        </div>

        <button type="submit" class="btn btn-primary">Crear Cliente</button>
    </form>
</div>

@endsection