@extends('layouts.app')

@section('title', 'Nuevo Plato')

@section('content')
    <h1>Formulario para crear un Plato</h1>

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


    <form action="{{route('platos.store')}}" method="POST">
        @csrf
        <label>Nombre: <input type="text" name="nombre" value="{{old('nombre')}}"></label>
        <br>
        <br>
        <label>Descripcion: <input type="text" name="descripcion" value="{{old('descripcion')}}"></label>
        <br>
        <br>
        <label>Precio: <input type="number" name="precio" value="{{old('precio')}}"></label>
        <br>
        <br>
        <button type="submit">Crear Plato</button>
    </form>

@endsection