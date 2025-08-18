<x-app-layout>
    <div class="container mx-auto max-w-lg py-8">
        <h2 class="text-2xl font-bold mb-6">Mesa de Ayuda</h2>
        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        <form method="POST" action="{{ route('helpdesk.store') }}" class="space-y-4">
            @csrf
            <div>
                <label for="nombre" class="block font-semibold">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-input w-full" value="{{ old('nombre') }}" required>
                @error('nombre') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="correo" class="block font-semibold">Correo</label>
                <input type="email" name="correo" id="correo" class="form-input w-full" value="{{ old('correo') }}" required>
                @error('correo') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="telefono" class="block font-semibold">Teléfono</label>
                <input type="text" name="telefono" id="telefono" class="form-input w-full" value="{{ old('telefono') }}" required>
                @error('telefono') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="titulo" class="block font-semibold">Título</label>
                <input type="text" name="titulo" id="titulo" class="form-input w-full" value="{{ old('titulo') }}" required>
                @error('titulo') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="descripcion" class="block font-semibold">Descripción</label>
                <textarea name="descripcion" id="descripcion" class="form-textarea w-full" rows="4" required>{{ old('descripcion') }}</textarea>
                @error('descripcion') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Enviar</button>
        </form>
    </div>
</x-app-layout>