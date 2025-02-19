@extends('layouts.app')

@section('title', __('messages.new_client'))

@section('titulo', __('messages.add_new_client'))

@section('content')

    @if($errors->any())
        <div class="alert alert-danger">
            <h2>{{ __('messages.fix_errors')}}:</h2>
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
    <form action="{{ route('clientes.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nombre" class="form-label">{{ __('messages.client_name')}}:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}">
        </div>

        <div class="mb-3">
            <label for="apellido" class="form-label">{{ __('messages.last_name')}}:</label>
            <input type="text" class="form-control" id="apellido" name="apellido" value="{{ old('apellido') }}">
        </div>

        <div class="mb-3">
            <label for="direccion" class="form-label">{{ __('messages.address')}}:</label>
            <input type="text" class="form-control" id="direccion" name="direccion" value="{{ old('direccion') }}" placeholder="Ej: Av. Siempre Viva 742" >
        </div>

        <div class="mb-3">
            <label for="telefono" class="form-label">{{ __('messages.phone')}}:</label>
            <input type="text" class="form-control" id="telefono" name="telefono" value="{{ old('telefono') }}">
        </div>

        <button type="submit" class="btn btn-primary">{{ __('messages.create_client')}}</button>
    </form>
</div>

@endsection