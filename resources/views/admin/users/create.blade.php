<x-app-layout>
    <div class="max-w-xl mx-auto mt-8 bg-white dark:bg-gray-900 p-8 rounded shadow">
        <h1 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-100">Agregar Usuario</h1>
        <form method="POST" action="{{ route('admin.users.store') }}">
            @csrf

            <!-- Nombre -->
            <div>
                <x-input-label for="name" :value="__('Nombre')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- RUT -->
            <div class="mt-4">
                <x-input-label for="rut" :value="__('RUT')" />
                <x-text-input id="rut" placeholder="x.xxx.xxx-x" class="block mt-1 w-full" type="text" name="rut" :value="old('rut')" autocomplete="rut" />
                <x-input-error :messages="$errors->get('rut')" class="mt-2" />
            </div>

            <!-- Fecha de Nacimiento -->
            <div class="mt-4">
                <x-input-label for="birthdate" :value="__('Fecha de Nacimiento')" />
                <x-text-input id="birthdate" class="block mt-1 w-full" type="date" name="birthdate" :value="old('birthdate')" autocomplete="birthdate" />
                <x-input-error :messages="$errors->get('birthdate')" class="mt-2" />
            </div>

            <!-- Correo -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Correo Electrónico')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Contraseña -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Contraseña')" />
                <x-text-input id="password" class="block mt-1 w-full"
                              type="password"
                              name="password"
                              required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirmar Contraseña -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirma contraseña')" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                              type="password"
                              name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- Rol -->
            <div class="mt-4">
                <x-input-label for="role" :value="__('Rol')" />
                <select id="role" name="role" class="block mt-1 w-full rounded border-gray-300 dark:bg-gray-800 dark:text-gray-100">
                    <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="instructor" {{ old('role') === 'instructor' ? 'selected' : '' }}>Instructor</option>
                    <option value="student" {{ old('role') === 'student' ? 'selected' : '' }}>Student</option>
                    <option value="evaluator" {{ old('role') === 'evaluator' ? 'selected' : '' }}>Evaluator</option>
                </select>
                <x-input-error :messages="$errors->get('role')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-6">
                <a href="{{ route('admin.users.index') }}" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                    Cancelar
                </a>
                <x-primary-button class="ms-4">
                    {{ __('Agregar Usuario') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>