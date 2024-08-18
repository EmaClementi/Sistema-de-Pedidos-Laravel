<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modificar Cliente</title>
</head>
<body>
    
    <h1>Formulario para Modificar un Cliente</h1>

    @if($errors->any())
        <div>
            <h2>Errores:</h2>
            <ul>
                @foreach($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('clientes.update', $cliente->id)}}" method="POST">
        @method('PUT')
        @csrf
        <label>Nombre<input type="text" name="nombre" value="{{old('nombre', $cliente->nombre)}}"></label>
        <br>
        <label>Apellido<input type="text" name="apellido" value="{{old('apellido', $cliente->apellido)}}"></label>
        <br>
        <label>Direccion<input type="text" name="direccion" value="{{old('direccion', $cliente->direccion)}}"></label>
        <br>
        <label>Telefono<input type="text" name="telefono" value="{{old('telefono', $cliente->telefono)}}"></label>
        <br>
        <button type="submit">Modificar Cliente</button>
    </form>

</body>
</html>