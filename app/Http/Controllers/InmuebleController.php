<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Inmueble;
use Illuminate\Http\Request;

class InmuebleController extends Controller
{
    public function index()
    {
        return response()->json(Inmueble::with('administrador')->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|string',
            'descripcion' => 'required|string',
            'direccion' => 'required|string',
            'precio' => 'required|numeric',
            'estado' => 'required|in:disponible,vendido,alquilado',
            'tipo' => 'required|in:venta,alquiler',
            'administrador_id' => 'required|exists:usuarios,id',
        ]);

        $inmueble = Inmueble::create($validated);
        return response()->json($inmueble, 201);
    }

    public function show($id)
    {
        return response()->json(Inmueble::with('administrador')->findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $inmueble = Inmueble::findOrFail($id);
        $inmueble->update($request->all());

        return response()->json($inmueble);
    }

    public function destroy($id)
    {
        Inmueble::destroy($id);
        return response()->json(['mensaje' => 'Inmueble eliminado']);
    }
}
