@extends('layouts.app')

@section('title', 'Cliente')

@section('titulo', 'Cliente')

@section('content')

    <div class="container mt-4">
        <a href="{{route('clientes.index')}}" class="btn btn-secondary mb-3">Volver a Clientes</a>
        
        <div class="card">
            <div class="card-header">
                <h3>Detalles del Cliente</h3>
            </div>
            <div class="card-body">
                <p><strong>Id del Cliente:</strong> {{$cliente->id }}</p>
                <p><strong>Nombre:</strong> {{$cliente->nombre}} </p>
                <p><strong>Apellido:</strong> {{$cliente->apellido}}</p>
                <p><strong>Direccion:</strong> {{$cliente->direccion}}</p>
                <p><strong>Telefono:</strong> {{$cliente->telefono}}</p>
            </div>
            <div class="card-footer">
                <a href="{{route('clientes.edit', $cliente->id)}}" class="btn btn-secondary mb-3">Modificar Datos</a>

                <form action="{{route('clientes.destroy', $cliente->id)}}" method="POST" class="d-inline-block float-end">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este cliente?')">Eliminar Cliente</button>
                </form>
            </div>
        </div>
    </div>
@endsection