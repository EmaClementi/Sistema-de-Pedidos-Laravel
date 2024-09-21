@extends('layouts.app')

@section('title', 'Platos')

@section('content')
    <h1>Todos los platos</h1>

    <a href="{{route('platos.create')}}">Nuevo Plato</a>
    <br>
    <br>
    @foreach ($platos as $plato)
        <li>
            <a href="{{route('platos.show', $plato->id)}}"> Plato con ID: {{ $plato->id }}</a>
            <hr>
        </li>
    @endforeach

    <a href="{{route('home')}}">Volver al Inicio</a>
    <br>
    <br>
    {{ $platos->links() }}

@endsection