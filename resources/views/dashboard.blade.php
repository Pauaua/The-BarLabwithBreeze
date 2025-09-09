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
                    @elseif($role === 'instructor')
                        <li>
                            <a href="#" class="block py-2 px-4 rounded hover:bg-gray-700 active" data-tab="courses">
                                Mis Cursos
                            </a>
                        </li>
                    @elseif($role === 'student')
                        <li>
                            <a href="#" class="block py-2 px-4 rounded hover:bg-gray-700 active" data-tab="courses">
                                Mis Cursos
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
            @if($role === 'admin')
                <div id="users-content" class="content-tab">
                    <h3 class="text-2xl font-medium text-gray-800 dark:text-gray-200 mb-4">Usuarios</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Nombre</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Email</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Rol</th>
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
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="px-6 py-4 text-center text-sm text-gray-500 dark:text-gray-400">
                                            No hay usuarios registrados.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif

            <div id="courses-content" class="content-tab {{ $role !== 'admin' ? '' : 'hidden' }}">
                <h3 class="text-2xl font-medium text-gray-800 dark:text-gray-200 mb-4">Cursos</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Título</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Descripción</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Acción</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse ($courses ?? [] as $course)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">{{ $course->title }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-300">{{ Str::limit($course->description, 60) }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ route('courses.show', $course) }}" class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400">Ver</a>
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
                <div id="enrollments-content" class="content-tab hidden">
                    <h3 class="text-2xl font-medium text-gray-800 dark:text-gray-200 mb-4">Inscripciones</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Estudiante</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Curso</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Fecha</th>
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
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="px-6 py-4 text-center text-sm text-gray-500 dark:text-gray-400">
                                            No hay inscripciones.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div id="helpdesk-content" class="content-tab hidden">
                    <h3 class="text-2xl font-medium text-gray-800 dark:text-gray-200 mb-4">Mesa de Ayuda</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Asunto</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Estado</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Fecha</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                @forelse ($helpdesk ?? [] as $ticket)
                                    <tr>
                                        <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-300">{{ $ticket->subject }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                                {{ ucfirst($ticket->status) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                                            {{ $ticket->created_at->format('d/m/Y') }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="px-6 py-4 text-center text-sm text-gray-500 dark:text-gray-400">
                                            No hay tickets en la mesa de ayuda.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
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