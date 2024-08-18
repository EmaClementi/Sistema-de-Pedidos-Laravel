<x-app-layout>

    <h1>Formulario para crear un Pedido</h1>

    @if($errors->any())
    <div>
        <h2>Errores:</h2>
        <ul>
            @foreach ($errors->all() as $error)
                <li>
                    {{$error}}
                </li>
            @endforeach
        </ul>
    </div>
@endif

    <form action="{{route('pedidos.update', $pedido->id)}}" method="POST">
        @method("PUT")
        @csrf
        <label>ID Cliente<input type="number" name="cliente_id" value="{{ old('cliente_id', $pedido->cliente_id) }}"></label>
        <br>
        <label>Fecha <input type="date" name="fecha" value="{{ old('fecha', $pedido->fecha) }}"></label>
        <br>
        <label>Forma de Pago <input type="text" name="forma_de_pago" value="{{ old('forma_de_pago', $pedido->forma_de_pago) }}"></label>
        <br>
        <label>Total <input type="number" name="total" value="{{ old('total', $pedido->total) }}"></label>
        <br>
        <label>Estado <input type="text" name="estado" value="{{ old('estado', $pedido->estado) }}"></label>
        <br>
        <button type="submit">Modificar Pedido</button>
    </form>
    

</x-app-layout>