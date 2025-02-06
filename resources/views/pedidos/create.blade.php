@extends('layouts.app')

@section('title', 'Nuevo Pedido')

@section('titulo', 'Crear Pedido')

@section('content')

@if($errors->any())
    <div class="alert alert-danger">
        <h3>Errores:</h3>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container mt-5">
    <h2 class="h2">Datos del Pedido</h2>

    <form action="{{ route('pedidos.store') }}" method="POST">
        @csrf

        <div class="my-4">
            <div class="form-group">
            <label for="cliente_id">Cliente:</label>
            <select name="cliente_id" id="cliente_id" class="form-control">
                @foreach ($clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                @endforeach
            </select>
            </div>
            
            <div class="form-group">
                <label for="fecha">Fecha:</label>
                <input type="date" name="fecha" id="fecha" class="form-control" required>
            </div>
        
            <div class="form-group">
                <label for="forma_de_pago">Forma de Pago:</label>
                <select class="form-control" name="forma_de_pago" id="forma_de_pago">
                    <option value="Efectivo">Efectivo</option>
                    <option value="Transferencia">Transferencia</option>
                    <option value="Tarjeta">Tarjeta</option>
                </select>
            </div> 
        </div>

    
        <h2 class="h2">Platos disponibles</h2>

        <div class="table-responsive" style="max-height: 300px; overflow-y: auto;">
            <table class="table">
                <thead>
                    <tr>
                        <th>Plato</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Seleccionar</th>
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
                                <input type="checkbox" name="platos[]" value="{{ $plato->id }}" class="plato-selector">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    
        <button type="submit" class="btn btn-primary">Confirmar Pedido</button>
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

@endsection
