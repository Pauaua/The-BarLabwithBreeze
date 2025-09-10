<x-app-layout>
    <div class="max-w-xl mx-auto mt-8 bg-white dark:bg-gray-900 p-8 rounded shadow">
        <h1 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-100">Editar Usuario</h1>
        <form method="POST" action="{{ route('admin.users.update', $user) }}">
            @csrf
            @method('PUT')

            <!-- Nombre -->
            <div>
                <x-input-label for="name" :value="__('Nombre')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- RUT -->
            <div class="mt-4">
                <x-input-label for="rut" :value="__('RUT')" />
                <x-text-input id="rut" class="block mt-1 w-full" type="text" name="rut" :value="old('rut', $user->rut)" autocomplete="rut" />
                <x-input-error :messages="$errors->get('rut')" class="mt-2" />
            </div>

            <!-- Fecha de Nacimiento -->
            <div class="mt-4">
                <x-input-label for="birthdate" :value="__('Fecha de Nacimiento')" />
                <x-text-input id="birthdate" class="block mt-1 w-full" type="date" name="birthdate" :value="old('birthdate', $user->birthdate)" autocomplete="birthdate" />
                <x-input-error :messages="$errors->get('birthdate')" class="mt-2" />
            </div>

            <!-- Correo -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Correo Electrónico')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $user->email)" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Rol -->
            <div class="mt-4">
                <x-input-label for="role" :value="__('Rol')" />
                <select id="role" name="role" class="block mt-1 w-full rounded border-gray-300 dark:bg-gray-800 dark:text-gray-100">
                    <option value="admin" {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="instructor" {{ old('role', $user->role) === 'instructor' ? 'selected' : '' }}>Instructor</option>
                    <option value="student" {{ old('role', $user->role) === 'student' ? 'selected' : '' }}>Student</option>
                    <option value="evaluator" {{ old('role', $user->role) === 'evaluator' ? 'selected' : '' }}>Evaluator</option>
                </select>
                <x-input-error :messages="$errors->get('role')" class="mt-2" />
            </div>

            <!-- Cambiar contraseña (opcional) -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Nueva Contraseña (opcional)')" />
                <x-text-input id="password" class="block mt-1 w-full"
                              type="password"
                              name="password"
                              autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-6">
                <a href="{{ route('admin.users.index') }}" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                    Cancelar
                </a>
                <x-primary-button class="ms-4">
                    {{ __('Actualizar Usuario') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>