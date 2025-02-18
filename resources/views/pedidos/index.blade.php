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
                    {{-- <td>{{$pedido->fecha}} --}}
                        <td>
                           {{ \Carbon\Carbon::parse($pedido->fecha)->translatedFormat(__('messages.date_format')) }} 
                        </td>

                    </td>
                    <td>{{$pedido->forma_de_pago}}</td>
                    <td>{{$pedido->total}}</td>
                    <td>
                        <form action="{{ route('pedidos.updateEstado', $pedido->id) }}" method="POST" class="d-inline-block" id="estadoForm_{{ $pedido->id }}">
                            @csrf
                            @method('PATCH')
                        
                            <select name="estado" class="form-control" onchange="this.form.submit()">
                                @foreach ($estados as $estado)
                                    <option value="{{ $estado }}" {{ $pedido->estado == $estado ? 'selected' : '' }}>
                                        {{ __('messages.status_options.' . $estado) }} 
                                    </option>
                                @endforeach
                            </select>
                        </form>
                        
                        
                        
                        
                        
                    </td>
                    <td>
                        <a href="{{ route('pedidos.show', $pedido->id) }}" class="btn btn-info btn-sm">{{ __('messages.view_details')}}</a>
                                                    </a>
                        <a href="{{route('pedidos.edit', $pedido->id)}}" class="btn btn-warning btn-sm">{{ __('messages.modify')}}</a>

                        <form action="{{ route('pedidos.destroy', $pedido->id) }}" method="POST" id="formEliminarPedido" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger btn-sm" onclick="mostrarModalConfirmacion('{{ __('messages.delete_confirmation', ['item' => __('messages.order')]) }}', '#formEliminarPedido')">
                                {{ __('messages.delete') }}
                            </button>
                        </form>
                        
                    
                        <x-modal-confirmacion :message="__('messages.delete_confirmation', ['item' => __('messages.order')])" :action="route('pedidos.destroy', $pedido->id)" />
    
                    </td>
                    
                </tr>
            
    
            @endforeach
            </tbody>
        </table>
    </div>
    
    <h2>{{ __('messages.billing_day')}}</h2>

    @if($facturacion)
        <p>{{ __('messages.date')}}: {{ $facturacion->fecha }}</p>
        <p>{{ __('messages.total_billed')}}: ${{ number_format($facturacion->total_facturado, 2) }}</p>
    @else
        <p>{{ __('messages.not_orders')}}</p>
    @endif

    <a href="{{route('home')}}">{{ __('messages.return_home')}}</a>
    <br>
    <br>
    {{ $pedidos->links('pagination::bootstrap-4')}}

@endsection