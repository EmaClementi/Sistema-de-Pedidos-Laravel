<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cliente por ID</title>
</head>
<body>
    
    <a href="{{route('clientes.index')}}">Volver a Clientes</a>

    <p>Id del Cliente: {{$cliente->id }}</p>
    <p>Nombre: {{$cliente->nombre}} </p>
    <p>Apellido: {{$cliente->apellido}}</p>
    <p>Direccion: {{$cliente->direccion}}</p>
    <p>Telefono: {{$cliente->telefono}}</p>

    <a href="{{route('clientes.edit', $cliente->id)}}">Modificar Datos</a>

    <form action="{{route('clientes.destroy', $cliente->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Eliminar Cliente</button>
    </form>

</body>
</html>