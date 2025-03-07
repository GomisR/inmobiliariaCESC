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
        <!-- Seleccionar comunidada autonoma -->
        <div class="form-group">
            <label for="comunidad_autonoma_id">Comunidad Autónoma</label>
            <select name="comunidad_autonoma_id" id="comunidad_autonoma_id" class="form-control">
                <option value="">Selecciona una Comunidad Autónoma</option>
                @foreach($comunidades as $comunidad)
                    <option value="{{ $comunidad->id }}"
                        {{ $piso->comunidad_autonoma_id == $comunidad->id ? 'selected' : '' }}>
                        {{ $comunidad->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit">Actualizar</button>
    </form>
    <a href="{{ route('pisos.index') }}">Volver</a>
@endsection
