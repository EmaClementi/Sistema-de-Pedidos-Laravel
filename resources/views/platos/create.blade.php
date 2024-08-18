<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Formulario para crear un Plato</h1>

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


    <form action="{{route('platos.store')}}" method="POST">
        @csrf
        <label>Nombre<input type="text" name="nombre" value="{{old('nombre')}}"></label>
        <br>
        <label>Descripcion<input type="text" name="descripcion" value="{{old('descripcion')}}"></label>
        <br>
        <label>Precio<input type="number" name="precio" value="{{old('precio')}}"></label>
        <br>
        <button type="submit">Crear Plato</button>
    </form>

</body>
</html>