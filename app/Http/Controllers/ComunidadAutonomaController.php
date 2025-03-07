<?php

namespace App\Http\Controllers;

use App\Models\ComunidadAutonoma;
use Illuminate\Http\Request;

class ComunidadAutonomaController extends Controller
{
    public function index()
    {
        $comunidades = ComunidadAutonoma::all();
        return view('comunidades.index', compact('comunidades'));
    }

    public function create()
    {
        return view('comunidades.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:comunidades_autonomas'
        ]);

        ComunidadAutonoma::create($request->all());

        return redirect()->route('comunidades.index')->with('success', 'Comunidad Autónoma creada correctamente.');
    }

    public function edit(ComunidadAutonoma $comunidad)
    {
        return view('comunidades.edit', compact('comunidad'));
    }

    public function update(Request $request, ComunidadAutonoma $comunidad)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:comunidades_autonomas,nombre,' . $comunidad->id
        ]);

        $comunidad->update($request->all());

        return redirect()->route('comunidades.index')->with('success', 'Comunidad Autónoma actualizada correctamente.');
    }

    public function destroy(ComunidadAutonoma $comunidad)
    {
        $comunidad->delete();
        return redirect()->route('comunidades.index')->with('success', 'Comunidad Autónoma eliminada correctamente.');
    }
}
