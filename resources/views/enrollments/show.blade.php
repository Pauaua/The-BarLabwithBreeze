@extends('layout')

@section('content')
<div class="container">
    <h1>Detalle de Inscripción</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Curso: {{ $enrollment->course->name ?? '-' }}</h5>
            <p class="card-text"><strong>Fecha de Inscripción:</strong> {{ $enrollment->enrollment_date }}</p>
            <p class="card-text"><strong>Estado:</strong> {{ $enrollment->status }}</p>
            <p class="card-text"><strong>Completado:</strong> {{ $enrollment->completed_at }}</p>
            <a href="{{ route('enrollments.index') }}" class="btn btn-primary">Volver</a>
        </div>
    </div>
</div>
@endsection