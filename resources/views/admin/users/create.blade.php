<x-guest-layout>
    <form method="POST" action="{{ route('registerUser') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nombre')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <!-- RUT -->

        <div>
            <x-input-label for="rut" :value="__('RUT')" />
            <x-text-input id="rut" placeholder="x.xxx.xxx-x" class="block mt-1 w-full" type="text" name="rut" :value="old('rut')" autofocus autocomplete="rut" />
            <x-input-error :messages="$errors->get('rut')" class="mt-2" />      
        </div>

        <!-- Date of Birth -->
         <div>
            <x-input-label for="birthdate" :value="__('Fecha de Nacimiento')" />
            <x-text-input id="birthdate" class="block mt-1 w-full" type="date" name="birthdate" :value="old('birthdate')" required autofocus autocomplete="birthdate" />
            <x-input-error :messages="$errors->get('birthdate')" class="mt-2" />        
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Correo Electrónico')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirma contraseña')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Asignar rol de usuario -->
         <div>
            <x-input-label for="role" :value="__('Rol')" />
            <select id="role" name="role" class="block mt-1 w-full">
                <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="instructor" {{ old('role') === 'instructor' ? 'selected' : '' }}>Instructor</option>
                <option value="student" {{ old('role') === 'student' ? 'selected' : '' }}>Student</option>
                <option value="evaluator" {{ old('role') === 'evaluator' ? 'selected' : '' }}>Evaluator</option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            
            <x-primary-button class="ms-4">
                {{ __('Registrar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
