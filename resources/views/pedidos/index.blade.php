@extends('layouts.app')

@section('title', __('messages.orders'))

@section('titulo', __('messages.orders'))

@section('content')
    

    <a href="{{route('pedidos.create')}}" class="btn btn-primary mb-3 d-block mx-auto">{{ __('messages.new_order')}}</a>

    <div class="table-responsive" style="min-width: 90%;">
        <table class="table table-fixed">
            <thead>
                <tr>
                    <th>{{ __('messages.client')}}</th>
                    <th>{{ __('messages.date')}}</th>
                    <th>{{ __('messages.payment_method')}}</th>
                    <th>{{ __('messages.total')}}</th>
                    <th>{{ __('messages.status')}}</th>
                    <th>{{ __('messages.actions')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pedidos as $pedido)
                <tr>
                    <td>{{$pedido->cliente->nombre}}</td>
                    <td>{{$pedido->fecha}}</td>
                    <td>{{$pedido->forma_de_pago}}</td>
                    <td>{{$pedido->total}}</td>
                    <td>
                        <form action="{{ route('pedidos.updateEstado', $pedido->id) }}" method="POST" class="d-inline-block" id="estadoForm_{{ $pedido->id }}">
                            @csrf
                            @method('PATCH')
                        
                            <select name="estado" class="form-control" onchange="this.form.submit()">
                                @foreach ($estados as $estado)
                                    <option value="{{ $estado }}" {{ $pedido->estado == $estado ? 'selected' : '' }}>
                                        {{ $estado }}
                                    </option>
                                @endforeach
                            </select>
                        </form>
                        
                        
                    </td>
                    <td>
                        <a href="{{ route('pedidos.show', $pedido->id) }}" class="btn btn-info btn-sm">{{ __('messages.view_details')}}</a>
                                                    </a>
                        <a href="{{route('pedidos.edit', $pedido->id)}}" class="btn btn-warning btn-sm">{{ __('messages.modify')}}</a>

                        <form action="{{ route('platos.destroy', $pedido->id) }}" method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este plato?')">{{ __('messages.delete')}}</button>
                        </form>
    
                    </td>
                    
                </tr>
            
    
            @endforeach
            </tbody>
        </table>
    </div>
    


    <a href="{{route('home')}}">Volver al Inicio</a>
    <br>
    <br>
    {{ $pedidos->links('pagination::bootstrap-4')}}

@endsection