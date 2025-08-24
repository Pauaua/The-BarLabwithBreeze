@extends('layouts.app')

@section('content')
<div class="min-h-screen flex flex-col items-center justify-center bg-gradient-to-br from-blue-100 to-blue-300 p-6">
    <div class="w-full max-w-lg bg-white shadow-lg rounded-lg p-6">
        <br>

        <h1 class="text-3xl font-bold mb-6 text-blue-700 text-center">Mesa de Ayuda</h1>
        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4 text-center">
                {{ session('success') }}
            </div>
        @endif

        <!-- Formulario de solicitud -->
        <form method="POST" action="{{ route('helpdesk.store') }}" class="space-y-4 mb-8">
            @csrf
            <div>
                <label for="nombre" class="block font-semibold text-blue-700">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-input w-full rounded border-blue-300" value="{{ old('nombre') }}" required>
                @error('nombre') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="correo" class="block font-semibold text-blue-700">Correo</label>
                <input type="email" name="correo" id="correo" class="form-input w-full rounded border-blue-300" value="{{ old('correo') }}" required>
                @error('correo') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="telefono" class="block font-semibold text-blue-700">Teléfono</label>
                <input type="text" name="telefono" id="telefono" class="form-input w-full rounded border-blue-300" value="{{ old('telefono') }}" required>
                @error('telefono') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="titulo" class="block font-semibold text-blue-700">Título</label>
                <input type="text" name="titulo" id="titulo" class="form-input w-full rounded border-blue-300" value="{{ old('titulo') }}" required>
                @error('titulo') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="descripcion" class="block font-semibold text-blue-700">Descripción</label>
                <textarea name="descripcion" id="descripcion" class="form-textarea w-full rounded border-blue-300" rows="4" required>{{ old('descripcion') }}</textarea>
                @error('descripcion') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded w-full font-bold">Enviar</button>
        </form>


        <br><br>


        <!-- Formulario de consulta de estado -->
        <h2 class="text-xl font-bold mb-4 text-blue-700 text-center">Conoce el estado de tu solicitud</h2>
        <form method="POST" action="{{ route('helpdesk.consulta') }}" class="mb-6">
            @csrf
            <div class="mb-2">
                <label for="consulta_id" class="block font-semibold text-blue-700">ID de Solicitud</label>
                <input type="number" name="consulta_id" id="consulta_id" class="form-input w-full rounded border-blue-300" value="{{ old('consulta_id', $consulta_id) }}" required>
                @error('consulta_id') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded w-full font-bold">Consultar</button>
        </form>

        <!-- Resultado de la consulta -->
        @if(!is_null($consulta_id))
            @if($solicitud)
                <div class="bg-blue-100 text-blue-700 p-3 rounded mb-4">
                    <strong>Solicitud #{{ $solicitud->id }}</strong><br>
                    <strong>Nombre:</strong> {{ $solicitud->nombre }}<br>
                    <strong>Correo:</strong> {{ $solicitud->correo }}<br>
                    <strong>Teléfono:</strong> {{ $solicitud->telefono }}<br>
                    <strong>Título:</strong> {{ $solicitud->titulo }}<br>
                    <strong>Descripción:</strong> {{ $solicitud->descripcion }}<br>
                    <strong>Estado:</strong> {{ ucfirst($solicitud->status) }}
                </div>
            @else
                <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-center">
                    No se ha encontrado la solicitud con el ID <strong>{{ $consulta_id }}</strong>.
                </div>
            @endif
        @endif
    </div>
</div>
@endsection