<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlatoRequest;
use App\Http\Requests\UpdatePlatoRequest;
use App\Models\Plato;


class PlatoController extends Controller
{
    public function index(){
        $platos = Plato::orderBy('id', 'desc')
                        ->paginate(5);
        return view('platos.index', compact('platos'));
    }
    public function show(Plato $plato){

        return view('platos.show', compact('plato'));
    }
    public function create(){

        return view('platos.create');
    }
    public function store(StorePlatoRequest $request){

        Plato::create($request->validated());

        return redirect()->route('platos.index');
    }
    public function edit(Plato $plato){

        return view('platos.edit', compact('plato'));
    }
    public function update(UpdatePlatoRequest $request, Plato $plato){
        $plato->update($request->validated());

        return redirect()->route('platos.show', $plato);
    }
    public function destroy(Plato $plato){
        $plato->delete();

        return redirect()->route('platos.index');
    }
}
