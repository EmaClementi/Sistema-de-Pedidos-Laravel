<x-app-layout>
    <h1>Todos los Pedidos</h1>


    <a href="{{route('pedidos.create')}}">Nuevo Pedido</a>
    <ul>
        @foreach ($pedidos as $pedido)
            <li>
                <a href="{{route('pedidos.show', $pedido->id)}}">Pedido con ID: {{ $pedido->id}}</a>
                
            </li>
            <hr>
        @endforeach

    </ul>
    <a href="{{route('home')}}">Volver al Inicio</a>
    <br>
    <br>
    {{ $pedidos->links()}}

</x-app-layout>
    
