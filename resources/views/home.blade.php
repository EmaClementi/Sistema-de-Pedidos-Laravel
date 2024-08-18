<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
        }
        h1 {
            text-align: center;
        }
        ul {
            display: flex;
            justify-content: space-around;
            list-style: none;
            padding: 0;
        }
        ul li {
            margin: 10px 0;
        }
        a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
            font-size: 20px
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bienvenido al Sistema de Gestion de Pedidos</h1>

        <ul>
            <li><a href="{{ route('pedidos.index') }}">Pedidos</a></li>
            <li><a href="{{ route('clientes.index') }}">Clientes</a></li>
            <li><a href="{{ route('platos.index') }}">Platos</a></li>
        </ul>
    </div>
</body>
</html>