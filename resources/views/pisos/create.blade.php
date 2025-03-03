@extends('layouts.app')

@section('content')
    <h1>Crear Piso</h1>
    <form action="{{ route('pisos.store') }}" method="POST">
        @csrf
        <label>Calle:</label>
        <input type="text" name="calle" required>

        <label>Precio:</label>
        <input type="number" name="precio" required>

        <label>Descripción:</label>
        <textarea name="descripcion"></textarea>

        <button type="submit">Guardar</button>
    </form>
    <a href="{{ route('pisos.index') }}">Volver</a>
@endsection
