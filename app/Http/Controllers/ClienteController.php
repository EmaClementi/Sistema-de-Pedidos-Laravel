<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClienteRequest;
use App\Http\Requests\UpdateClienteRequest;
use App\Models\Cliente;

class ClienteController extends Controller
{
    public function index(){
        $clientes = Cliente::orderBy('id', 'desc')
                            ->paginate(5);

        return view('clientes.index', compact('clientes'));
    }
    public function show(Cliente $cliente){

        return view('clientes.show', compact('cliente'));
    }
    public function create(){
        
        return view('clientes.create');
    }
    public function store(StoreClienteRequest $request){

        Cliente::create($request->validated());

        return redirect()->route('clientes.index');
    }
    public function edit(Cliente $cliente){

        return view('clientes.edit', compact('cliente'));
    }
    public function update(UpdateClienteRequest $request, Cliente $cliente){

        $cliente->update($request->validated());

        return redirect()->route('clientes.index');
    }
    public function destroy(Cliente $cliente){
        $cliente->delete();

        return redirect()->route('clientes.index');
    }
}
