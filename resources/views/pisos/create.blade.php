@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/stilosCSS.css') }}">
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

        <label>Comunidad Autónoma:</label>
        <select name="comunidad_autonoma_id" required>
            <option value="" disabled selected>Selecciona una comunidad autónoma</option>
            @foreach($comunidades as $comunidad)
                <option value="{{ $comunidad->id }}">{{ $comunidad->nombre }}</option>
            @endforeach
        </select>

        <button type="submit">Guardar</button>
    </form>
    <a href="{{ route('pisos.index') }}">Volver</a>
@endsection
