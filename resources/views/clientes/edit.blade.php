@extends('layouts.app')

@section('title', __('messages.edit_client'))

@section('titulo', __('messages.edit_client'))

@section('content')
    
    @if($errors->any())
        <div>
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
        <form action="{{route('clientes.update', $cliente->id)}}" method="POST">
            @method('PUT')
            @csrf

            <div class="mb-3">
                <label for="nombre" class="form-label">{{ __('messages.name')}}: </label>
                <input type="text" name="nombre" pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$" class="form-control" id="nombre" value="{{old('nombre', $cliente->nombre)}}">
            </div>
               
            <div class="mb-3">
                <label for="apellido" class="form-label">{{ __('messages.last_name')}}:</label>
                <input type="text" name="apellido" pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$" class="form-control" id="apellido" value="{{old('apellido', $cliente->apellido)}}">
            </div>
           
            <div class="mb-3">
                <label for="direccion" class="form-label">{{ __('messages.address')}}:</label>
                <input type="text" name="direccion" pattern="[A-Za-z0-9\s,.-]+" class="form-control" id="direccion" value="{{old('direccion', $cliente->direccion)}}">
            </div>
            
            <div class="mb-3">
                <label for="telefono" class="form-label">{{ __('messages.phone')}}:</label>
                <input type="text" name="telefono" pattern="^\+?[0-9\s\-\(\)]{7,20}$" class="form-control" id="telefono" value="{{old('telefono', $cliente->telefono)}}">
            </div>
          
            <button type="submit" class="btn btn-primary">{{ __('messages.edit_client')}}</button>
        </form>
    </div>
@endsection