@extends('layouts.app')

@section('title', __('messages.client'))

@section('titulo', __('messages.client'))

@section('content')

    <div class="container mt-4">
        <a href="{{route('clientes.index')}}" class="btn btn-secondary mb-3">{{ __('messages.back_to_clients')}}</a>
        
        <div class="card">
            <div class="card-header">
                <h3>{{ __('messages.client_details')}}</h3>
            </div>
            <div class="card-body">
                <p><strong>{{ __('messages.client_id')}}:</strong> {{$cliente->id }}</p>
                <p><strong>{{ __('messages.name')}}:</strong> {{$cliente->nombre}} </p>
                <p><strong>{{ __('messages.last_name')}}:</strong> {{$cliente->apellido}}</p>
                <p><strong>{{ __('messages.address')}}:</strong> {{$cliente->direccion}}</p>
                <p><strong>{{ __('messages.phone')}}:</strong> {{$cliente->telefono}}</p>
            </div>
            <div class="card-footer">
                <a href="{{route('clientes.edit', $cliente->id)}}" class="btn btn-secondary mb-3">{{ __('messages.modify_data')}}</a>

                <form action="{{route('clientes.destroy', $cliente->id)}}" method="POST" class="d-inline-block float-end">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este cliente?')">{{ __('messages.delete_client')}}</button>
                </form>
            </div>
        </div>
    </div>
@endsection