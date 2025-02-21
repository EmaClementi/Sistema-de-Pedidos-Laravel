@extends('layouts.app')

@section('title', __('messages.new_order'))

@section('titulo', __('messages.create_order'))

@section('content')

@if($errors->any())
    <div class="alert alert-danger">
        <h3>{{ __('messages.fix_errors')}}:</h3>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container mt-5">
    <h2 class="h2">{{ __('messages.order_data')}}</h2>

    <form action="{{ route('pedidos.store') }}" method="POST">
        @csrf

        <div class="my-4">
            <div class="form-group">
            <label for="cliente_id">{{ __('messages.client')}}:</label>
            <select name="cliente_id" id="cliente_id" class="form-control">
                @foreach ($clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                @endforeach
            </select>
            </div>
            
            <div class="form-group">
                <label for="fecha">{{ __('messages.date')}}:</label>
                <input type="date" name="fecha" id="fecha" class="form-control">
            </div>
        
            <div class="form-group">
                <label for="forma_de_pago">{{ __('messages.payment_method')}}:</label>
                <select class="form-control" name="forma_de_pago" id="forma_de_pago">
                    <option value="cash">{{ __('messages.cash')}}</option>
                    <option value="bank_transfer">{{ __('messages.transfer')}}</option>
                    <option value="credit_card">{{ __('messages.card')}}</option>
                </select>
            </div> 
        </div>

    
        <h2 class="h2">{{ __('messages.available_dishes')}}</h2>

        <div class="table-responsive" style="max-height: 300px; overflow-y: auto;">
            <table class="table">
                <thead>
                    <tr>
                        <th>{{ __('messages.dishes')}}</th>
                        <th>{{ __('messages.price')}}</th>
                        <th>{{ __('messages.quantity')}}</th>
                        <th>{{ __('messages.select')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($platos as $plato)
                        <tr>
                            <td>{{ $plato->nombre }}</td>
                            <td>${{ $plato->precio }}</td>
                            <td>
                                <input type="number" name="cantidades[{{ $plato->id }}]" value="1" min="1" class="form-control" style="width: 60px;" disabled>
                            </td>
                            <td>
                                <input type="checkbox" name="platos[]" value="{{ $plato->id }}" class="plato-selector" style="width: 2rem; height: 2rem">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    
        <button type="submit" class="btn btn-primary">{{__('messages.confirm_order')}}</button>



    </form>

    <script>
        // Activar/desactivar los inputs de cantidad según la selección
        document.querySelectorAll('.plato-selector').forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const cantidadInput = this.closest('tr').querySelector('input[type="number"]');
                cantidadInput.disabled = !this.checked; // Habilitar/deshabilitar la cantidad
                if (!this.checked) {
                    cantidadInput.value = 1; // Reiniciar la cantidad a 1 cuando se deselecciona
                }
            });
        });
    </script>
    

</div>

<a href="{{route('pedidos.index')}}">{{ __('messages.back_to_orders') }}</a>
@endsection
