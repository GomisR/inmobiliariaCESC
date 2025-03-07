@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/stilosCSS.css') }}">
    <div id="Contenido">
        <h1>Listado de Pisos</h1>
        <a href="{{ route('pisos.create') }}" class="btn btn-primary mb-4">Crear Nuevo Piso</a>

        <table class="table table-striped">
            <thead>
            <tr>
                <th>Calle</th>
                <th>Precio (€)</th>
                <th>Descripción</th>
                <th>Comunidad Autónoma</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($pisos as $piso)
                <tr>
                    <td>{{ $piso->calle }}</td>
                    <td>{{ $piso->precio }}€</td>
                    <td>{{ $piso->descripcion }}</td>
                    <td>{{ $piso->comunidadAutonoma ? $piso->comunidadAutonoma->nombre : 'No asignada' }}</td>
                    <td>
                        <a href="{{ route('pisos.edit', $piso) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('pisos.destroy', $piso) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este piso?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <a href="{{ url('/') }}" class="btn btn-secondary">Volver</a>
        </table>
    </div>
@endsection
