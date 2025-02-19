@extends('layouts.app')

@section('title', __('messages.new_dish'))

@section('titulo',  __('messages.dishes'))

@section('content')

        <a href="{{ route('platos.create') }}" class="btn btn-primary mb-3 d-block mx-auto">{{ __('messages.new_dish')}}</a>

        <div class="table-responsive" style="min-height: 35vh; min-width: 80%">
            <table class="table table-fixed" >
                <thead>
                    <tr>
                        <th>{{ __('messages.number')}}</th>
                        <th>{{ __('messages.name')}}</th>
                        <th>{{ __('messages.description')}}</th>
                        <th>{{ __('messages.price')}}</th>
                        <th>{{ __('messages.actions')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($platos as $plato)
                        <tr>
                            <td>{{ $plato->id }}</td>
                            <td>{{ $plato->nombre }}</td>
                            <td>{{ $plato->descripcion }}</td>
                            <td>${{ $plato->precio }}</td>
                            <td>
                                <a href="{{ route('platos.edit', $plato->id) }}" class="btn btn-warning btn-sm">{{ __('messages.edit')}}</a>

                                <form action="{{ route('platos.destroy', $plato->id) }}" method="POST" id="formEliminarPlato" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-sm" onclick="mostrarModalConfirmacion('{{ __('messages.delete_confirmation', ['item' => __('messages.dish')]) }}', '#formEliminarPlato')">
                                        {{ __('messages.delete') }}
                                    </button>
                                </form>
                                
                            
                                <x-modal-confirmacion :message="__('messages.delete_confirmation', ['item' => __('messages.dish')])" :action="route('platos.destroy', $plato->id)" />
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <a href="{{route('home')}}">{{ __('messages.return_home') }}</a>
        <br>
        <br>
        {{ $platos->links('pagination::bootstrap-4') }}
    </div>
@endsection
