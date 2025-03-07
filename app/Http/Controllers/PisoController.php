<?php

namespace App\Http\Controllers;

use App\Models\ComunidadAutonoma;
use App\Models\Piso;
use Illuminate\Http\Request;

class PisoController extends Controller
{
    public function index()
    {
        $pisos = Piso::with('comunidadAutonoma')->get();
        return view('pisos.indexPisos', compact('pisos'));
    }

    public function create()
    {
        $comunidades = ComunidadAutonoma::all();
        return view('pisos.create', compact('comunidades'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'calle' => 'required',
            'precio' => 'required|numeric',
            'descripcion' => 'nullable',
            'comunidad_autonoma_id' => 'required|exists:comunidades_autonomas,id',  // Asegúrate de que la comunidad seleccionada exista
        ]);

        Piso::create([
            'calle' => $request->calle,
            'precio' => $request->precio,
            'descripcion' => $request->descripcion,
            'comunidad_autonoma_id' => $request->comunidad_autonoma_id,
        ]);

        return redirect()->route('pisos.index')->with('success', 'Piso creado correctamente.');
    }

    public function show(Piso $piso)
    {
        return view('pisos.show', compact('piso'));
    }

    public function edit(Piso $piso)
    {
        $comunidades = ComunidadAutonoma::all();
        return view('pisos.edit', compact('piso', 'comunidades'));
    }

    public function update(Request $request, Piso $piso)
    {
        $request->validate([
            'calle' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            'descripcion' => 'nullable|string',
            'comunidad_autonoma_id' => 'nullable|exists:comunidades_autonomas,id',
        ]);

        $piso->update($request->all());

        return redirect()->route('pisos.index')->with('success', 'Piso actualizado correctamente.');
    }

    public function destroy(Piso $piso)
    {
        $piso->delete();
        return redirect()->route('pisos.index')->with('success', 'Piso eliminado correctamente.');
    }
}
