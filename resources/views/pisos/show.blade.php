@extends('layouts.app')

@section('content')
    <h1>Detalles del Piso</h1>
    <p><strong>Calle:</strong> {{ $piso->calle }}</p>
    <p><strong>Precio:</strong> {{ $piso->precio }}€</p>
    <p><strong>Descripción:</strong> {{ $piso->descripcion }}</p>

    <a href="{{ route('pisos.index') }}">Volver</a>
    <a href="{{ route('pisos.edit', $piso) }}">Editar</a>

    <form action="{{ route('pisos.destroy', $piso) }}" method="POST" style="display:inline;">
        @csrf @method('DELETE')
        <button type="submit">Eliminar</button>
    </form>
    <a href="{{ route('pisos.index') }}">Volver</a>
@endsection
