<x-app-layout>
    <div class="container mt-4">
        <h1>{{ $resource->titulo }}</h1>
        <p><strong>Curso:</strong> {{ $resource->course?->titulo ?? '-' }}</p>
        <p><strong>Descripción:</strong> {{ $resource->descripcion }}</p>
        <p>
            <a href="{{ asset('storage/' . $resource->archivo) }}" target="_blank" class="btn btn-success">
                Descargar Archivo
            </a>
        </p>
        <a href="{{ route('resources.index') }}" class="btn btn-secondary">Volver</a>
    </div>
</x-app-layout>