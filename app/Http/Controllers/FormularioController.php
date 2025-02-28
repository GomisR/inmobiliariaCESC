<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormularioController extends Controller
{
    //Metodo para mostrar el formulario
    public function mostrarFormulario()
    {
        return view('index'); // Muestra la vista index.blade.php
    }

    //Metodo para procesar el envío del formulario
    public function procesarFormulario(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'correo' => 'required|email|max:255',
            'telefono' => 'required|string|max:20',
            'mensaje' => 'required|string',
        ]);

        // Aquí puedes procesar los datos (guardar en la base de datos, enviar un correo, etc.)
        $nombre = $request->input('nombre');
        $apellido = $request->input('apellido');
        $correo = $request->input('correo');
        $telefono = $request->input('telefono');
        $mensaje = $request->input('mensaje');

        // Redirigir con un mensaje de éxito
        return redirect()->route('formulario.mostrar')->with('success', 'Formulario enviado correctamente');
    }
}
