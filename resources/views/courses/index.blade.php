@extends('layout')

@section('content')
<div class="container">
    <h1>Cursos</h1>
    <a href="{{ route('courses.create') }}" class="btn btn-primary mb-3">Crear Curso</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Imagen</th>
                <th>Fecha de Inicio</th>
                <th>Duración (semanas)</th>
                <th>ID Instructor</th>
                <th>Publicado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($courses as $course)
            <tr>
                <td>{{ $course->id }}</td>
                <td>{{ $course->name }}</td>
                <td>{{ $course->description }}</td>
                <td>
                    @if($course->image_url)
                        <img src="{{ $course->image_url }}" alt="Imagen" style="max-width:60px;max-height:60px;">
                    @endif
                </td>
                <td>{{ $course->start_date }}</td>
                <td>{{ $course->duration_weeks }}</td>
                <td>{{ $course->instructor_id }}</td>
                <td>{{ $course->published_status ? 'Sí' : 'No' }}</td>
                <td>
                    <a href="{{ route('courses.show', $course->id) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display:inline-block;">
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