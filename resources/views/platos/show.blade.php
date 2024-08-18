<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <a href="{{route('platos.index')}}">Volver a Platos</a>

    <p>Nombre: {{$plato->nombre}} </p>
    <p>Descripcion: {{$plato->descripcion}}</p>
    <p>Precio: {{$plato->precio}}</p>

    <a href="{{route('platos.edit', $plato->id)}}">Modificar Datos</a>

    <form action="{{route('platos.destroy', $plato->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Eliminar Plato</button>
    </form>

</body>
</html>