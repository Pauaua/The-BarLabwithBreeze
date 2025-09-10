<x-app-layout>
    <div class="container mt-4">
        <h1 class="mb-4">Material de Apoyo</h1>
        <a href="{{ route('resources.create') }}" class="btn btn-primary mb-3">Nuevo Recurso</a>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Curso</th>
                    <th>Archivo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($resources as $resource)
                    <tr>
                        <td>{{ $resource->titulo }}</td>
                        <td>{{ $resource->course?->titulo ?? '-' }}</td>
                        <td>
                            <a href="{{ asset('storage/' . $resource->archivo) }}" target="_blank" class="btn btn-sm btn-outline-secondary">
                                Descargar
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('resources.show', $resource) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('resources.edit', $resource) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('resources.destroy', $resource) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar recurso?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $resources->links() }}
    </div>
</x-app-layout>