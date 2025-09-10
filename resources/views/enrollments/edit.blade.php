<x-app-layout>

<div class="container">
    <h1>Editar Inscripción</h1>
    <form action="{{ route('enrollments.update', $enrollment->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="course_id" class="form-label">Curso</label>
            <select name="course_id" id="course_id" class="form-control" required>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}" {{ $enrollment->course_id == $course->id ? 'selected' : '' }}>{{ $course->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="enrollment_date" class="form-label">Fecha de Inscripción</label>
            <input type="date" name="enrollment_date" id="enrollment_date" class="form-control" value="{{ $enrollment->enrollment_date }}" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Estado</label>
            <select name="status" id="status" class="form-control" required>
                <option value="en curso" {{ $enrollment->status == 'en curso' ? 'selected' : '' }}>En curso</option>
                <option value="terminado" {{ $enrollment->status == 'terminado' ? 'selected' : '' }}>Terminado</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('enrollments.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</x-app-layout>
