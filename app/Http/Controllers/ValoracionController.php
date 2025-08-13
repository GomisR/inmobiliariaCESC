<?php
namespace App\Http\Controllers;

use App\Models\Valoracion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ValoracionController extends Controller
{
    public function index()
    {
        $valoraciones = Valoracion::with('usuario')->get();
        $media = Valoracion::avg('puntuacion');

        return response()->json([
            'valoraciones' => $valoraciones,
            'media' => round($media, 2),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'puntuacion' => 'required|integer|min:1|max:5',
            'comentario' => 'nullable|string',
        ]);

        $valoracion = new Valoracion();
        $valoracion->usuario_id = auth()->id();
        $valoracion->puntuacion = $validated['puntuacion'];
        $valoracion->comentario = $validated['comentario'] ?? null;
        $valoracion->save();

        return response()->json($valoracion, 201);
    }


    public function show($id)
    {
        $valoracion = Valoracion::with('usuario')->findOrFail($id);
        return response()->json($valoracion);    }

    public function update(Request $request, $id)
    {
        $valoracion = Valoracion::findOrFail($id);
        $request->validate([
            'puntuacion' => 'integer|min:1|max:5',
            'comentario' => 'nullable|string|max:1000',
        ]);

        $valoracion->update($request->only('puntuacion', 'comentario'));

        return response()->json($valoracion);
    }

    public function destroy($id)
    {
        $valoracion = Valoracion::findOrFail($id);
        $valoracion->delete();

        return response()->json(['message' => 'Valoración eliminada']);
    }
}
