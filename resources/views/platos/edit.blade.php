<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <h1>Formulario para Modificar un Plato</h1>

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

    <form action="{{route('platos.update', $plato->id)}}" method="POST">
        @method('PUT')
        @csrf
        <label>Nombre<input type="text" name="nombre" value="{{old('nombre', $plato->nombre)}}"></label>
        <br>
        <label>Descripcion<input type="text" name="descripcion" value="{{old('descripcion', $plato->descripcion)}}"></label>
        <br>
        <label>Precio<input type="number" name="precio" value="{{old('precio', $plato->precio)}}"></label>
        <br>
        
        <button type="submit">Modificar Plato</button>
    </form>

</body>
</html>