<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('base/css/general.css')}}">
    <title>Crear Cliente</title>
</head>
<body>
    
    <h1>__("form_cliente")</h1>

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

    <form action="{{route('clientes.store')}}" method="POST">
        @csrf
        <label>Nombre: <input type="text" name="nombre" value="{{old('nombre')}}"></label>
        <br>
        <br>
        <label>Apellido: <input type="text" name="apellido" value="{{old('apellido')}}"></label>
        <br>
        <br>
        <label>Direccion: <input type="text" name="direccion" value="{{old('direccion')}}"></label>
        <br>
        <br>
        <label>Telefono: <input type="text" name="telefono" value="{{old('telefono')}}"></label>
        <br>
        <br>
        <button type="submit">Crear Cliente</button>
    </form>


</body>
</html>