@extends('layouts.app')

@section('title', __('messages.dish'))

@section('titulo', __('messages.dish'))

@section('content')

    <div class="container mt-4">
        <a href="{{ route('platos.index') }}" class="btn btn-secondary mb-3">{{__('messages.back_to_dishes')}}</a>

        <div class="card">
            <div class="card-header">
                <h3>{{__('messages.dish_details')}}</h3>
            </div>
            <div class="card-body">
                <p><strong>{{__('messages.name')}}:</strong> {{$plato->nombre}} </p>
                <p><strong>{{__('messages.description')}}:</strong> {{$plato->descripcion}}</p>
                <p><strong>{{__('messages.price')}}:</strong> ${{$plato->precio}}</p>
            </div>
            <div class="card-footer">
                <a href="{{ route('platos.edit', $plato->id) }}" class="btn btn-warning">{{__('messages.modify_dish')}}</a>

                <form action="{{ route('platos.destroy', $plato->id) }}" method="POST" class="d-inline-block float-end">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este plato?')">{{__('messages.delete_dish')}}</button>
                </form>
            </div>
        </div>
    </div>

@endsection
