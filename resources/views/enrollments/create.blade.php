@extends('layout')

@section('content')
<div class="container">
    <h1>Inscribirse a un Curso</h1>
    <form action="{{ route('enrollments.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="course_id" class="form-label">Curso</label>
            <select name="course_id" id="course_id" class="form-control" required>
                <option value="">Seleccione un curso</option>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}" {{ (old('course_id', $course_id ?? '') == $course->id) ? 'selected' : '' }}>{{ $course->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="enrollment_date" class="form-label">Fecha de Inscripción</label>
            <input type="date" name="enrollment_date" id="enrollment_date" class="form-control" value="{{ old('enrollment_date', date('Y-m-d')) }}" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Estado</label>
            <input type="text" name="status" id="status" class="form-control" value="{{ old('status', 'en curso') }}" required>
        </div>
        <button type="submit" class="btn btn-success">Inscribirse</button>
        <a href="{{ route('enrollments.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection