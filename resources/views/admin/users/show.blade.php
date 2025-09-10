<x-app-layout>
    <div class="max-w-xl mx-auto mt-8 bg-white dark:bg-gray-900 p-8 rounded shadow">
        <h1 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-100">Detalle de Usuario</h1>
        <div class="mb-4">
            <strong>Nombre:</strong> {{ $user->name }}
        </div>
        <div class="mb-4">
            <strong>Correo:</strong> {{ $user->email }}
        </div>
        <div class="mb-4">
            <strong>RUT:</strong> {{ $user->rut ?? '-' }}
        </div>
        <div class="mb-4">
            <strong>Fecha de Nacimiento:</strong> {{ $user->birthdate ?? '-' }}
        </div>
        <div class="mb-4">
            <strong>Rol:</strong> {{ ucfirst($user->role) }}
        </div>
        <div class="flex items-center justify-end mt-6">
            <a href="{{ route('admin.users.index') }}" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                Volver
            </a>
            <a href="{{ route('admin.users.edit', $user) }}" class="ms-4 text-indigo-600 hover:text-indigo-900 dark:text-indigo-400">Editar</a>
        </div>
    </div>
</x-app-layout>