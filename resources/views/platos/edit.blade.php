@extends('layouts.app')

@section('title', __('messages.modify_dish'))

@section('titulo', __('messages.modify_dish'))

@section('content')
    

    @if($errors->any())
        <div class="alert alert-danger">
            <h4>{{ __('messages.fix_errors')}}:</h4>
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
                <label for="nombre" class="form-label">{{ __('messages.name')}}</label>
                <input type="text" id="nombre" pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$" name="nombre" class="form-control" value="{{old('nombre', $plato->nombre)}}">
            </div>
            
            <div class="mb-3">
                <label for="descripcion" class="form-label">{{ __('messages.description')}}</label>
                <input type="text" id="descripcion" pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$" name="descripcion" class="form-control" value="{{old('descripcion', $plato->descripcion)}}">
            </div>
            
            <div class="mb-3">
                <label for="precio" class="form-label">{{ __('messages.price')}}</label>
                <input type="text" id="precio" pattern="^\+?[0-9\s\-\(\)]{7,20}$" name="precio" class="form-control" value="{{old('precio', $plato->precio)}}">
            </div>
            
            <button type="submit" class="btn btn-primary">{{__('messages.modify_dish')}}</button>
        </form>

    </div>
    

@endsection

