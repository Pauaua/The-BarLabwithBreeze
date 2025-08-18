@extends('layout')

@section('content')
<div class="container">
    <h1>Mis Inscripciones</h1>
    <a href="{{ route('enrollments.create') }}" class="btn btn-primary mb-3">Nueva Inscripción</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Curso</th>
                <th>Fecha de Inscripción</th>
                <th>Estado</th>
                <th>Completado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($enrollments as $enrollment)
            <tr>
                <td>{{ $enrollment->id }}</td>
                <td>{{ $enrollment->course->name ?? '-' }}</td>
                <td>{{ $enrollment->enrollment_date }}</td>
                <td>{{ $enrollment->status }}</td>
                <td>{{ $enrollment->completed_at }}</td>
                <td>
                    <a href="{{ route('enrollments.show', $enrollment->id) }}" class="btn btn-info btn-sm">Ver</a>
                    <form action="{{ route('enrollments.destroy', $enrollment->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection