@extends('layouts.app')

@section('content')
    <h1>Listado de Pisos</h1>
    <a href="{{ route('pisos.create') }}">Crear Nuevo Piso</a>
    <ul>
        @foreach($pisos as $piso)
            <li>{{ $piso->calle }} - {{ $piso->precio }}€
                <a href="{{ route('pisos.show', $piso) }}">Ver</a>
                <a href="{{ route('pisos.edit', $piso) }}">Editar</a>
                <form action="{{ route('pisos.destroy', $piso) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </li>
        @endforeach
    </ul>
    <a href="{{ route('index') }}">Volver</a>
@endsection
