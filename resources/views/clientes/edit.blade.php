@extends('layouts.app')

@section('title', 'Modificar Cliente')

@section('titulo', 'Modificar un Cliente')

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
        <form action="{{route('clientes.update', $cliente->id)}}" method="POST">
            @method('PUT')
            @csrf

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre: </label>
                <input type="text" name="nombre" class="form-control" id="nombre" value="{{old('nombre', $cliente->nombre)}}">
            </div>
               
            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido:</label>
                <input type="text" name="apellido" class="form-control" id="apellido" value="{{old('apellido', $cliente->apellido)}}">
            </div>
           
            <div class="mb-3">
                <label for="direccion" class="form-label">Direccion:</label>
                <input type="text" name="direccion" class="form-control" id="direccion" value="{{old('direccion', $cliente->direccion)}}">
            </div>
            
            <div class="mb-3">
                <label for="telefono" class="form-label">Telefono:</label>
                <input type="text" name="telefono" class="form-control" id="telefono" value="{{old('telefono', $cliente->telefono)}}">
            </div>
          
            <button type="submit" class="btn btn-primary">Modificar Cliente</button>
        </form>
    </div>
@endsection