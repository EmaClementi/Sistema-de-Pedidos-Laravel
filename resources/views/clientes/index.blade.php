@extends('layouts.app')

@section('title', 'Gestión de Clientes')

@section('titulo', 'Clientes')

@section('content')
    
    <a href="{{route('clientes.create')}}" class="btn btn-primary mb-3 d-block mx-auto">Nuevo Cliente</a>

  {{-- <ul>
        @foreach ($clientes as $cliente)
            <li>
                <a href="{{route('clientes.show', $cliente->id)}}"> Cliente con ID: {{ $cliente->id }}</a>
                <hr>
            </li>
        @endforeach  
    </ul>
    --}}
   
    <div class="table-responsive" style="min-height: 35vh">
        <table class="table table-fixed">
            <thead>
                <tr>
                    <th>Numero</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Direccion</th>
                    <th>Telefono</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clientes as $cliente)
                    <tr>
                        <td>{{ $cliente->id }}</td>
                        <td>{{ $cliente->nombre }}</td>
                        <td>{{ $cliente->apellido }}</td>
                        <td>{{ $cliente->direccion }}</td>
                        <td>{{ $cliente->telefono }}</td>
                        <td>
                            <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-warning btn-sm">Editar</a>

                            <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este cliente')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <a href="{{route('home')}}">Volver al Inicio</a>
    <br>
    <br>
    {{ $clientes->links('pagination::bootstrap-4')}}
</div>
@endsection