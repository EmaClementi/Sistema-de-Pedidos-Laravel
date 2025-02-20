<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Plato;
use App\Models\Pedido;
use App\Http\Requests\StorePedidoRequest;
use App\Http\Requests\UpdatePedidoRequest;
use App\Models\Cliente;
use App\Models\Detalle_pedido;
use Carbon\Carbon;

class PedidoController extends Controller
{
    public function index() {
        $pedidos = Pedido::with('cliente')->orderBy('id', 'desc')->paginate(6);
        $estados = ['en_proceso', 'listo_para_entregar', 'en_camino', 'entregado'];
    
    
        $facturacion = Pedido::join('detalle_pedidos', 'pedidos.id', '=', 'detalle_pedidos.pedido_id')
        ->join('platos', 'detalle_pedidos.plato_id', '=', 'platos.id')
        ->selectRaw('pedidos.fecha, SUM(platos.precio * detalle_pedidos.cantidad) as total_facturado')
        ->whereDate('pedidos.fecha', Carbon::today())
        ->groupBy('pedidos.fecha')
        ->first();


    return view('pedidos.index', compact('pedidos', 'estados', 'facturacion'));
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

        // dd($request->all());
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

        $detallePedidos = $pedido->detalle_pedido()->with('plato')->get();

        $formasDePago = ['Efectivo', 'Transferencia', 'Tarjeta'];

        $clientes = Cliente::all();
        $platos = Plato::all();
        $platos_seleccionados = Detalle_pedido::where('pedido_id', $pedido->id)->pluck('plato_id')->toArray();

        return view('pedidos.edit', compact('pedido', 'clientes', 'platos', 'detallePedidos', 'formasDePago'));
    }
    
    public function update(UpdatePedidoRequest $request, Pedido $pedido){

        $pedido->update([
            'fecha' => $request->fecha,
            'forma_de_pago' => $request->forma_de_pago,
        ]);
    
        $pedido->detalle_pedido()->delete(); 
    
        if ($request->has('platos')) {
            foreach ($request->platos as $platoId) {
                $cantidad = $request->cantidades[$platoId] ?? 1; 
    
                $pedido->detalle_pedido()->create([
                    'plato_id' => $platoId,
                    'cantidad' => $cantidad,
                ]);
            }
        }
    
        $total = $pedido->detalle_pedido()->join('platos', 'detalle_pedidos.plato_id', '=', 'platos.id')
            ->sum(DB::raw('detalle_pedidos.cantidad * platos.precio'));
    
        $pedido->update(['total' => $total]);
    
        
        return redirect()->route('pedidos.show', $pedido);
    }
    public function updateEstado(Request $request, $id){

    $pedido = Pedido::findOrFail($id);

    $request->validate([
        'estado' => 'required|in:en_proceso,en_camino,entregado,listo_para_entregar', 
    ]);

    $pedido->estado = $request->estado;
    $pedido->save();


    return redirect()->route('pedidos.index');
}
    public function destroy(Pedido $pedido){
        // $pedido = Pedido::find($pedido);
        $pedido->delete();

        return redirect('/pedidos');
    }
}
