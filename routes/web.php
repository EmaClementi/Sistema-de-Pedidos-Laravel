<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\Detalle_pedidoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PlatoController;
use App\Models\Pedido;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::resource('pedidos', PedidoController::class);

Route::resource('clientes', ClienteController::class);

Route::resource('platos', PlatoController::class);

Route::resource('detalle-pedido', Detalle_pedidoController::class);

// Route::get('/pedidos', [PedidoController::class, 'index'])
//     ->name('pedidos.index');

// Route::get('/pedido/{id}', [PedidoController::class, 'show'])
//     ->name('pedido.show');

// Route::get('/pedidos/create', [PedidoController::class, 'create'])
//     ->name('pedidos.create');

// Route::post('/pedido', [PedidoController::class, 'store'])
//     ->name('pedido.store');

// Route::get('/pedidos/{id}/edit', [PedidoController::class, 'edit'])
//     ->name('pedidos.edit');

// Route::put('/pedidos/{id}', [PedidoController::class, 'update'])
//     ->name('pedidos.update');

// Route::delete('/pedidos/{id}', [PedidoController::class, 'destroy'])
//     ->name('pedidos.delete');

Route::get('prueba', function(){
    // CREAR UN PEDIDO

    // $pedido = new Pedido();
    // $pedido->fecha = '2024-04-04;
    // $pedido->forma_de_pago = 'Contado';
    // $pedido->estado = 'En Proceso;
    // $pedido->total = 2500;

    //$pedido->save();

    //BUSCAR UN PEDIDO POR ID

    // $pedido::find(1);

    // BUSCAR UN PEDIDO EN BASE A UN CAMPO ESPECIFICO
    $pedido = Pedido::where('estado', 'En Proceso')
                    ->first(); // me trae el primer registro que coincida.
    
    // ACTUALIZAR UN PEDIDO QUE BUSQUE

    // $pedido->estado = 'Entregado';

    // $pedido->save(); // con save guardamos los cambios en la BD.

    // return $pedido

    //TRAER VARIOS PEDIDOS

    // $pedido = Pedido::all(); //con all traemos todos los registros.

    // TRAER TODOS LOS PEDIDOS CON DETERMINADA CONDICION

    //traer los pedidos con id mayor o igual que 2
    // $pedido = Pedido::where('id', '>=', '2')
    //                 ->get();
      
    // traer todos los pedidos de forma descendente por id
    // tambien puede ser por un campo string y los ordenaria por abecedario.
    // $pedido = Pedido::orderBy('id', 'desc')
    //                 ->select('id', 'estado', 'fecha') // de toda la busqueda que solo me traiga estos 3 campos
    //                 ->take(2) // que me traiga solo 2 pedidos
    //                 ->get();

    //ELIMINAR UN PEDIDO
    
    // $pedido = Pedido::find(1);
    // $pedido->delete();

    // return "Eliminado Correctamente";


});