@extends('layouts.app')

@section('content')
    <h1>Editar Piso</h1>
    <form action="{{ route('pisos.update', $piso) }}" method="POST">
        @csrf @method('PUT')

        <label>Calle:</label>
        <input type="text" name="calle" value="{{ $piso->calle }}" required>

        <label>Precio:</label>
        <input type="number" name="precio" value="{{ $piso->precio }}" required>

        <label>Descripción:</label>
        <textarea name="descripcion">{{ $piso->descripcion }}</textarea>

        <button type="submit">Actualizar</button>
    </form>
    <a href="{{ route('pisos.index') }}">Volver</a>
@endsection
