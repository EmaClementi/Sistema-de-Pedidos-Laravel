@extends('layouts.app')

@section('title', __('messages.client_management'))

@section('titulo', __('messages.client'))

@section('content')
    
    <a href="{{route('clientes.create')}}" class="btn btn-primary mb-3 d-block mx-auto">{{ __('messages.new_client')}}</a>

  {{-- <ul>
        @foreach ($clientes as $cliente)
            <li>
                <a href="{{route('clientes.show', $cliente->id)}}"> Cliente con ID: {{ $cliente->id }}</a>
                <hr>
            </li>
        @endforeach  
    </ul>
    --}}
   
    <div class="table-responsive" style="min-height: 35vh">
        <table class="table table-fixed">
            <thead>
                <tr>
                    <th>{{ __('messages.number')}}</th>
                    <th>{{ __('messages.name')}}</th>
                    <th>{{ __('messages.last_name')}}</th>
                    <th>{{ __('messages.address')}}</th>
                    <th>{{ __('messages.phone')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clientes as $cliente)
                    <tr>
                        <td>{{ $cliente->id }}</td>
                        <td>{{ $cliente->nombre }}</td>
                        <td>{{ $cliente->apellido }}</td>
                        <td>{{ $cliente->direccion }}</td>
                        <td>{{ $cliente->telefono }}</td>
                        <td>
                            <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-warning btn-sm">{{ __('messages.edit')}}</a>
                            
                            <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" id="formEliminarCliente" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger btn-sm" onclick="mostrarModalConfirmacion('{{ __('messages.delete_confirmation', ['item' => __('messages.client')]) }}', '#formEliminarCliente')">
                                    {{ __('messages.delete') }}
                                </button>
                            </form>
                            
                        
                            <x-modal-confirmacion :message="__('messages.delete_confirmation', ['item' => __('messages.client')])" :action="route('clientes.destroy', $cliente->id)" />

                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <a href="{{route('home')}}">{{ __('messages.return_home') }}</a>
    <br>
    <br>
    {{ $clientes->links('pagination::bootstrap-4')}}
</div>
@endsection