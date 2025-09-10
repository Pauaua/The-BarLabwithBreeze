<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-900 text-white fixed h-full">
            <div class="p-5">
                <h3 class="text-lg font-semibold">Menú</h3>
                <ul class="mt-4 space-y-2">
                    @php
                        $role = Auth::user()->role;
                    @endphp

                    @if($role === 'admin')
                        <li>
                            <a href="#" class="block py-2 px-4 rounded hover:bg-gray-700 active" data-tab="users">
                                Usuarios
                            </a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 px-4 rounded hover:bg-gray-700" data-tab="courses">
                                Cursos
                            </a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 px-4 rounded hover:bg-gray-700" data-tab="enrollments">
                                Inscripciones
                            </a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 px-4 rounded hover:bg-gray-700" data-tab="helpdesk">
                                Mesa de Ayuda
                            </a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 px-4 rounded hover:bg-gray-700" data-tab="resources">
                                Recursos
                            </a>
                        </li>
                    @elseif($role === 'instructor')
                        <li>
                            <a href="#" class="block py-2 px-4 rounded hover:bg-gray-700 active" data-tab="courses">
                                Mis Cursos
                            </a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 px-4 rounded hover:bg-gray-700" data-tab="resources">
                                Recursos
                            </a>
                        </li>
                    @elseif($role === 'student')
                        <li>
                            <a href="#" class="block py-2 px-4 rounded hover:bg-gray-700 active" data-tab="courses">
                                Mis Cursos
                            </a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 px-4 rounded hover:bg-gray-700" data-tab="resources">
                                Recursos
                            </a>
                        </li>
                    @endif

                    <!-- Cerrar sesión -->
                    <li class="mt-8">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="w-full text-left block py-2 px-4 rounded hover:bg-gray-700 text-red-400 hover:text-red-300 transition">
                                Cerrar sesión
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Contenido principal -->
        <div class="flex-1 ml-64 p-6">
            @php
                $role = Auth::user()->role;
            @endphp

            @if($role === 'admin')
                <!-- Usuarios -->
                <div id="users-content" class="content-tab">
                    <h3 class="text-2xl font-medium text-gray-800 dark:text-gray-200 mb-4">Usuarios</h3>
                    <a href="{{ route('admin.users.create') }}"
                    class="mb-4 inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition">
                    + Agregar Usuario
                    </a>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Nombre</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Email</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Rol</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                @forelse ($users ?? [] as $user)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-dark">{{ $user->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-800">{{ $user->email }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                                {{ ucfirst($user->role) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <a href="{{ route('admin.users.edit', $user) }}" class="text-yellow-600 hover:text-yellow-900 dark:text-yellow-400 me-2">Editar</a>
                                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="text-red-600 hover:text-red-900 dark:text-red-400 bg-transparent border-0 p-0" onclick="return confirm('¿Eliminar usuario?')">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-6 py-4 text-center text-sm text-gray-500 dark:text-gray-400">
                                            No hay usuarios registrados.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif

            <!-- Cursos -->
            <div id="courses-content" class="content-tab {{ $role !== 'admin' ? '' : 'hidden' }}">
                <h3 class="text-2xl font-medium text-dark-800 dark:text-gray-200 mb-4">Cursos</h3>
                @if($role === 'admin' || $role === 'instructor')
                    <a href="{{ route('courses.create') }}"
                        class="mb-4 inline-block bg-blue-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition">
                        + Agregar Curso
                    </a>
                @elseif($role === 'student')
                    <a href="{{ route('enrollments.create') }}"
                        class="mb-4 inline-block bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded transition">
                        + Inscribirse en Curso
                    </a>
                @endif
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Título</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Descripción</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse ($courses ?? [] as $course)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">{{ $course->title }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-300">{{ Str::limit($course->description, 60) }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ route('courses.edit', $course) }}" class="text-yellow-600 hover:text-yellow-900 dark:text-yellow-400 me-2">Editar</a>
                                        <form action="{{ route('courses.destroy', $course) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-red-600 hover:text-red-900 dark:text-red-400 bg-transparent border-0 p-0" onclick="return confirm('¿Eliminar curso?')">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-6 py-4 text-center text-sm text-gray-500 dark:text-gray-400">
                                        No hay cursos disponibles.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            @if($role === 'admin')
                <!-- Inscripciones -->
                <div id="enrollments-content" class="content-tab hidden">
                    <h3 class="text-2xl font-medium text-gray-800 dark:text-gray-200 mb-4">Inscripciones</h3>
                    <a href="{{ route('enrollments.create') }}"
                        class="mb-4 inline-block bg-blue-600 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded transition">
                        + Agregar Inscripción
                    </a>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Estudiante</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Curso</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Fecha</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                @forelse ($enrollments ?? [] as $enrollment)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">{{ $enrollment->user->name }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-300">{{ $enrollment->course->title }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                                            {{ $enrollment->created_at->format('d/m/Y') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <a href="{{ route('enrollments.edit', $enrollment) }}" class="text-yellow-600 hover:text-yellow-900 dark:text-yellow-400 me-2">Editar</a>
                                            <form action="{{ route('enrollments.destroy', $enrollment) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="text-red-600 hover:text-red-900 dark:text-red-400 bg-transparent border-0 p-0" onclick="return confirm('¿Eliminar inscripción?')">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-6 py-4 text-center text-sm text-gray-500 dark:text-gray-400">
                                            No hay inscripciones.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Mesa de Ayuda -->
                <div id="helpdesk-content" class="content-tab hidden">
                    <h3 class="text-2xl font-medium text-gray-800 dark:text-gray-200 mb-4">Mesa de Ayuda</h3>
                    <a href="{{ route('helpdesk.create') }}"
                        class="mb-4 inline-block bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded transition">
                        + Nuevo Ticket
                    </a>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Asunto</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Estado</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Fecha</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                @forelse ($helpdesk ?? [] as $ticket)
                                    <tr>
                                        <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-300">{{ $ticket->titulo ?? $ticket->subject }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                                {{ ucfirst($ticket->status) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                                            {{ $ticket->created_at->format('d/m/Y') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <a href="{{ route('helpdesk.edit', $ticket) }}" class="text-yellow-600 hover:text-yellow-900 dark:text-yellow-400 me-2">Editar</a>
                                            <form action="{{ route('helpdesk.destroy', $ticket) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="text-red-600 hover:text-red-900 dark:text-red-400 bg-transparent border-0 p-0" onclick="return confirm('¿Eliminar ticket?')">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-6 py-4 text-center text-sm text-gray-500 dark:text-gray-400">
                                            No hay tickets en la mesa de ayuda.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif

            <!-- Recursos -->
            <div id="resources-content" class="content-tab hidden">
                <h3 class="text-2xl font-medium text-gray-800 dark:text-gray-200 mb-4">Material de Apoyo</h3>
                @if($role === 'admin' || $role === 'instructor')
                    <a href="{{ route('resources.create') }}"
                        class="mb-4 inline-block bg-cyan-600 hover:bg-cyan-700 text-white font-bold py-2 px-4 rounded transition">
                        + Agregar Recurso
                    </a>
                @endif
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Título</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Curso</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Archivo</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse ($resources ?? [] as $resource)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">{{ $resource->titulo }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-300">{{ $resource->course?->titulo ?? '-' }}</td>
                                    <td class="px-6 py-4">
                                        <a href="{{ asset('storage/' . $resource->archivo) }}" target="_blank" class="btn btn-sm btn-outline-secondary">
                                            Descargar
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ route('resources.edit', $resource) }}" class="text-warning-600 hover:text-warning-900 dark:text-yellow-400 me-2">Editar</a>
                                        <form action="{{ route('resources.destroy', $resource) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-red-600 hover:text-red-900 dark:text-red-400 bg-transparent border-0 p-0" onclick="return confirm('¿Eliminar recurso?')">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-4 text-center text-sm text-gray-500 dark:text-gray-400">
                                        No hay recursos disponibles.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const tabs = document.querySelectorAll('[data-tab]');
            const contents = document.querySelectorAll('.content-tab');

            tabs.forEach(tab => {
                tab.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = this.getAttribute('data-tab');
                    showTab(target);
                });
            });

            function showTab(tabName) {
                contents.forEach(content => {
                    content.classList.add('hidden');
                });
                const selected = document.getElementById(`${tabName}-content`);
                if (selected) {
                    selected.classList.remove('hidden');
                }
                tabs.forEach(tab => {
                    tab.classList.remove('bg-gray-700');
                    if (tab.getAttribute('data-tab') === tabName) {
                        tab.classList.add('bg-gray-700');
                    }
                });
            }

            // Activar primera pestaña
            const firstTab = document.querySelector('[data-tab].active') || document.querySelector('[data-tab]');
            if (firstTab) {
                const tab = firstTab.getAttribute('data-tab');
                showTab(tab);
            }
        });
    </script>
</x-app-layout>