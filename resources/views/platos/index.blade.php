@extends('layouts.app')

@section('title', 'Gestión de Platos')

@section('titulo', 'Platos')

@section('content')

        <a href="{{ route('platos.create') }}" class="btn btn-primary mb-3 d-block mx-auto">Nuevo Plato</a>

        <div class="table-responsive" style="min-height: 35vh; min-width: 80%">
            <table class="table table-fixed" >
                <thead>
                    <tr>
                        <th>Numero</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($platos as $plato)
                        <tr>
                            <td>{{ $plato->id }}</td>
                            <td>{{ $plato->nombre }}</td>
                            <td>{{ $plato->descripcion }}</td>
                            <td>${{ $plato->precio }}</td>
                            <td>
                                <a href="{{ route('platos.edit', $plato->id) }}" class="btn btn-warning btn-sm">Editar</a>

                                <form action="{{ route('platos.destroy', $plato->id) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este plato?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $platos->links('pagination::bootstrap-4') }}
    </div>
@endsection
