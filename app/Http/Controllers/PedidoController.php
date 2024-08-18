<?php

namespace App\Http\Controllers;

use App\Models\Plato;
use App\Models\Pedido;
use App\Http\Requests\StorePedidoRequest;
use App\Http\Requests\UpdatePedidoRequest;
use App\Models\Cliente;
use App\Models\Detalle_pedido;

class PedidoController extends Controller
{
    public function index(){
        $pedidos = Pedido::orderBy('id', 'desc')
                        ->paginate(5);
        return view('pedidos.index', compact('pedidos'));
    }
    public function show(Pedido $pedido){


        //compact('id');  ['id' => $id]
        $pedido = Pedido::with('detalle_pedido.plato')->find($pedido->id);

        return view('pedidos.show', compact('pedido'));
    }
    public function create(){

        $platos = Plato::all();
        $clientes = Cliente::all();

        return view('pedidos.create', compact('platos', 'clientes'));
    }
    public function store(StorePedidoRequest $request){

        $pedido = Pedido::create([
            'cliente_id' => $request->cliente_id,
            'fecha' => $request->fecha,
            'forma_de_pago' => $request->forma_de_pago,
            'total' => 0,
            'estado' => 'En Proceso',
        ]);

        // $pedido = new Pedido();

        // $pedido->cliente_id = $request->cliente_id;
        // $pedido->fecha = $request->fecha;
        // $pedido->forma_de_pago = $request->forma_de_pago;
        // $pedido->total = $request->total;
        // $pedido->estado = $request->estado;

        // $pedido->save();

        $total = 0;

        foreach ($request->platos as $platoId) {
            $cantidad = $request->cantidades[$platoId];
            $plato = Plato::find($platoId);
            $precio = $plato->precio * $cantidad;
    
            Detalle_pedido::create([
                'pedido_id' => $pedido->id,
                'plato_id' => $platoId,
                'cantidad' => $cantidad,
            ]);
    
            $total += $precio;
        }
    


        $pedido->update(['total' => $total]);
        return redirect()->route('pedidos.index');
    }
    public function edit(Pedido $pedido){
        // $pedido = Pedido::find($id);

        return view('pedidos.edit', compact('pedido'));
    }
    public function update(UpdatePedidoRequest $request, Pedido $pedido){
        // $pedido = Pedido::find($pedido);
        

        // $request->validate([
        //     'cliente_id' => 'required',
        //     'fecha' => 'required',
        //     'forma_de_pago' => 'required',
        //     'total' => 'required',
        //     'estado' => 'required',
        // ]);
        
        $pedido->update($request->validated());

        // $pedido->cliente_id = $request->cliente_id;
        // $pedido->fecha = $request->fecha;
        // $pedido->forma_de_pago = $request->forma_de_pago;
        // $pedido->total = $request->total;
        // $pedido->estado = $request->estado;

        // $pedido->save();

        return redirect()->route('pedidos.show', $pedido);
    }
    public function destroy(Pedido $pedido){
        // $pedido = Pedido::find($pedido);
        $pedido->delete();

        return redirect('/pedidos');
    }
}
