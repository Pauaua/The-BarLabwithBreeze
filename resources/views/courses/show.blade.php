@extends('layout')

@section('content')
<div class="container">
    <h1>Detalle del Curso</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $course->name }}</h5>
            <p class="card-text"><strong>Descripción:</strong> {{ $course->description }}</p>
            @if($course->image_url)
                <p><img src="{{ $course->image_url }}" alt="Imagen" style="max-width:200px;"></p>
            @endif
            <p><strong>Fecha de Inicio:</strong> {{ $course->start_date }}</p>
            <p><strong>Duración (semanas):</strong> {{ $course->duration_weeks }}</p>
            <p><strong>ID Instructor:</strong> {{ $course->instructor_id }}</p>
            <p><strong>Publicado:</strong> {{ $course->published_status ? 'Sí' : 'No' }}</p>
            <a href="{{ route('courses.index') }}" class="btn btn-primary">Volver</a>
        </div>
    </div>
</div>
@endsection