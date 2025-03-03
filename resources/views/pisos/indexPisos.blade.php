@extends('layouts.app')

@section('content')
    <h1>Listado de Pisos</h1>
    <a href="{{ route('pisos.create') }}" class="btn btn-primary mb-4">Crear Nuevo Piso</a>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Calle</th>
            <th>Precio (€)</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($pisos as $piso)
            <tr>
                <td>{{ $piso->calle }}</td>
                <td>{{ $piso->precio }}€</td>
                <td>{{ $piso->descripcion }}</td>
                <td>
                    <!-- Editar -->
                    <a href="{{ route('pisos.edit', $piso) }}" class="btn btn-warning btn-sm">Editar</a>

                    <!-- Eliminar -->
                    <form action="{{ route('pisos.destroy', $piso) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este piso?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <a href="{{ url('/') }}" class="btn btn-secondary">Volver</a>
@endsection
