@extends('layouts.app')

@section('title', 'Inicio')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endpush

@section('content')
<div class="container">
    <h1>Bienvenido al Sistema de Gestión de Pedidos</h1>

    <div class="card-container">
        <div class="card">
            <a href="{{ route('pedidos.index') }}">
                <img src="{{ asset('img/imagenPedidos.png') }}" alt="Pedidos">
                <span>Pedidos</span>
            </a>
        </div>
        <div class="card">
            <a href="{{ route('clientes.index') }}">
                <img src="{{ asset('img/imagenClientes.png') }}" alt="Clientes">
                <span>Clientes</span>
            </a>
        </div>
        <div class="card">
            <a href="{{ route('platos.index') }}">
                <img src="{{ asset('img/imagenPlatos.png') }}" alt="Platos">
                <span>Platos</span>
            </a>
        </div>
    </div>
</div>
@endsection


