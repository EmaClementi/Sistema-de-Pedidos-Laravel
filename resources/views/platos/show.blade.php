@extends('layouts.app')

@section('title', 'Plato')

@section('titulo', 'Plato')

@section('content')

    <div class="container mt-4">
        <a href="{{ route('platos.index') }}" class="btn btn-secondary mb-3">Volver a Platos</a>

        <div class="card">
            <div class="card-header">
                <h3>Detalles del Plato</h3>
            </div>
            <div class="card-body">
                <p><strong>Nombre:</strong> {{$plato->nombre}} </p>
                <p><strong>Descripción:</strong> {{$plato->descripcion}}</p>
                <p><strong>Precio:</strong> ${{$plato->precio}}</p>
            </div>
            <div class="card-footer">
                <a href="{{ route('platos.edit', $plato->id) }}" class="btn btn-warning">Modificar Datos</a>

                <form action="{{ route('platos.destroy', $plato->id) }}" method="POST" class="d-inline-block float-end">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este plato?')">Eliminar Plato</button>
                </form>
            </div>
        </div>
    </div>

@endsection
