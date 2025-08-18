<div class="mb-3">
    <label for="name" class="form-label">Nombre</label>
    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $course->name ?? '') }}" required>
</div>
<div class="mb-3">
    <label for="description" class="form-label">Descripción</label>
    <textarea name="description" id="description" class="form-control">{{ old('description', $course->description ?? '') }}</textarea>
</div>
<div class="mb-3">
    <label for="image_url" class="form-label">URL de Imagen</label>
    <input type="text" name="image_url" id="image_url" class="form-control" value="{{ old('image_url', $course->image_url ?? '') }}">
</div>
<div class="mb-3">
    <label for="start_date" class="form-label">Fecha de Inicio</label>
    <input type="date" name="start_date" id="start_date" class="form-control" value="{{ old('start_date', $course->start_date ?? '') }}">
</div>
<div class="mb-3">
    <label for="duration_weeks" class="form-label">Duración (semanas)</label>
    <input type="number" name="duration_weeks" id="duration_weeks" class="form-control" value="{{ old('duration_weeks', $course->duration_weeks ?? '') }}">
</div>
<div class="mb-3">
    <label for="instructor_id" class="form-label">ID Instructor</label>
    <input type="number" name="instructor_id" id="instructor_id" class="form-control" value="{{ old('instructor_id', $course->instructor_id ?? '') }}">
</div>
<div class="mb-3">
    <label for="published_status" class="form-label">Publicado</label>
    <select name="published_status" id="published_status" class="form-control">
        <option value="0" {{ old('published_status', $course->published_status ?? 0) == 0 ? 'selected' : '' }}>No</option>
        <option value="1" {{ old('published_status', $course->published_status ?? 0) == 1 ? 'selected' : '' }}>Sí</option>
    </select>
</div>