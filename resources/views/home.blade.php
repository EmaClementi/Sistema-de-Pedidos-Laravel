@extends('layouts.app')

@section('title', 'Inicio')

@section('titulo', __('messages.welcome_to_the_order_management_system'))

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endpush

@section('content')

<h2 class="titulo-principal">{{ __('messages.what_would_you_like_to_manage')}}</h2>
    
<div class="container">

    <div class="card-container">
        <div class="card">
            <a href="{{ route('pedidos.index') }}">
                <img src="{{ asset('img/imagenPedidos.png') }}" alt="Pedidos">
                <span>{{ __('messages.orders')}}</span>
            </a>
        </div>
        <div class="card">
            <a href="{{ route('clientes.index') }}">
                <img src="{{ asset('img/imagenClientes.png') }}" alt="Clientes">
                <span>{{ __('messages.clients')}}</span>
            </a>
        </div>
        <div class="card">
            <a href="{{ route('platos.index') }}">
                <img src="{{ asset('img/imagenPlatos.png') }}" alt="Platos">
                <span>{{ __('messages.dishes')}}</span>
            </a>
        </div>
    </div>
</div>
@endsection


