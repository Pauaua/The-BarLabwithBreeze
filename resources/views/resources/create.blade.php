<x-app-layout>
    <div class="container mt-4">
        <h1>Nuevo Recurso</h1>
        <form action="{{ route('resources.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('resources._form')
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('resources.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</x-app-layout>