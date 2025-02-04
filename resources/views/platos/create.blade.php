@extends('layouts.app')

@section('title', 'Nuevo Plato')

@section('titulo', 'Agregar Nuevo Plato')

@section('content')

    <!-- Muestra los errores si los hay -->
    @if($errors->any())
        <div class="alert alert-danger">
            <h4>Errores:</h4>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif 

    <div class="container mt-5">
        <form action="{{ route('platos.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del Plato:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}">
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción del Plato:</label>
                <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ old('descripcion') }}">
            </div>

            <div class="mb-3">
                <label for="precio" class="form-label">Precio del Plato:</label>
                <input type="number" class="form-control" id="precio" name="precio" value="{{ old('precio') }}">
            </div>

            <button type="submit" class="btn btn-primary">Crear Plato</button>
        </form>
    </div>

@endsection
