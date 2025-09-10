<x-app-layout>
    <div class="container mt-4">
        <h1>Editar Recurso</h1>
        <form action="{{ route('resources.update', $resource) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('resources._form')
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('resources.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</x-app-layout>