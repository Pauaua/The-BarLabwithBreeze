<div class="mb-3">
    <label for="titulo" class="form-label">Título</label>
    <input type="text" name="titulo" id="titulo" class="form-control" value="{{ old('titulo', $resource->titulo ?? '') }}" required>
    @error('titulo') <span class="text-danger">{{ $message }}</span> @enderror
</div>
<div class="mb-3">
    <label for="descripcion" class="form-label">Descripción</label>
    <textarea name="descripcion" id="descripcion" class="form-control">{{ old('descripcion', $resource->descripcion ?? '') }}</textarea>
    @error('descripcion') <span class="text-danger">{{ $message }}</span> @enderror
</div>
<div class="mb-3">
    <label for="course_id" class="form-label">Curso relacionado (opcional)</label>
    <select name="course_id" id="course_id" class="form-control">
        <option value="">-- Ninguno --</option>
        @foreach($courses as $course)
            <option value="{{ $course->id }}" {{ old('course_id', $resource->course_id ?? '') == $course->id ? 'selected' : '' }}>
                {{ $course->titulo }}
            </option>
        @endforeach
    </select>
    @error('course_id') <span class="text-danger">{{ $message }}</span> @enderror
</div>
<div class="mb-3">
    <label for="archivo" class="form-label">Archivo</label>
    <input type="file" name="archivo" id="archivo" class="form-control" {{ isset($resource) ? '' : 'required' }}>
    @if(isset($resource) && $resource->archivo)
        <small class="form-text text-muted">Archivo actual: <a href="{{ asset('storage/' . $resource->archivo) }}" target="_blank">Descargar</a></small>
    @endif
    @error('archivo') <span class="text-danger">{{ $message }}</span> @enderror
</div>