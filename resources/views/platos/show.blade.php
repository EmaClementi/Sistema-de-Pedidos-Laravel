@extends('layouts.app')

@section('title', 'Plato')

@section('content')

    <a href="{{route('platos.index')}}">Volver a Platos</a>

    <p>Nombre: {{$plato->nombre}} </p>
    <p>Descripcion: {{$plato->descripcion}}</p>
    <p>Precio: {{$plato->precio}}</p>

    <a href="{{route('platos.edit', $plato->id)}}">Modificar Datos</a>

    <form action="{{route('platos.destroy', $plato->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Eliminar Plato</button>
    </form>

@endsection