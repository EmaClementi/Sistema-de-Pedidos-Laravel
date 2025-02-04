@extends('layouts.app')

@section('title', 'Modificar Plato')

@section('titulo', 'Modificar un Plato')

@section('content')
    

    @if($errors->any())
        <div class="alert alert-danger">
            <h4>Errores:</h4>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container mt-5">

        <form action="{{route('platos.update', $plato->id)}}" method="POST">
            @method('PUT')
            @csrf
            
    
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" id="nombre" name="nombre" class="form-control" value="{{old('nombre', $plato->nombre)}}">
            </div>
            
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <input type="text" id="descripcion" name="descripcion" class="form-control" value="{{old('descripcion', $plato->descripcion)}}">
            </div>
            
            <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" id="precio" name="precio" class="form-control" value="{{old('precio', $plato->precio)}}">
            </div>
            
            <button type="submit" class="btn btn-primary">Modificar Plato</button>
        </form>

    </div>
    

@endsection

