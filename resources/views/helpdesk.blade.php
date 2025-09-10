<!-- Extiende el layout principal de la aplicación (definido en resources/views/layouts/app.blade.php) -->
<!-- Se usa para usar el layout predefinido y despues insertar el codigo en el (sección predefinida) -->

<x-app-layout>



    <!-- Corresponde a el div principal, es azul claro con un degradado, la idea es que tenga una identidad visual a la del resto de la pagina, neutra y "clínica"-->
    <div class="min-h-screen flex flex-col items-center justify-center bg-gradient-to-br from-blue-100 to-blue-300 p-6">



        <!-- Sección introductoria: mensaje de bienvenida y descripción del servicio -->
        <div class="w-full max-w-lg bg-white shadow-lg rounded-lg p-6 mb-8">
            <h1 class="text-2xl font-bold mb-4 text-blue-700 text-center">Bienvenido a nuestra Mesa de Ayuda</h1>
            <p class="text-base text-gray-700 leading-relaxed text-center">
                ¿Tienes dudas técnicas, problemas con tus accesos, o necesitas orientación sobre el uso de plataformas académicas? 
                ¡Estamos aquí para ayudarte! Nuestra Mesa de Ayuda está diseñada especialmente para acompañarte en tu experiencia educativa, 
                brindándote soporte rápido, claro y personalizado.
            </p>
        </div>



        <!-- Sección principal: formulario de envío de solicitud -->
        <div class="w-full max-w-lg bg-white shadow-lg rounded-lg p-6">



            <!-- Título del formulario -->
            <h1 class="text-3xl font-bold mb-6 text-blue-700 text-center">Ingresa tus datos y tu solicitud</h1>



            <!-- Mensaje de éxito (si existe) tras enviar el formulario -->
            <!-- el success viene desde el controlador HelpDeskController -->
            @if(session('success'))
                <div class="bg-green-100 text-green-700 p-3 rounded mb-4 text-center">
                    {{ session('success') }}
                </div>
            @endif



            <!-- Formulario de creación de solicitud -->
            <form method="POST" action="{{ route('helpdesk.store') }}" class="space-y-4 mb-8">
                @csrf <!-- Token CSRF para protección contra ataques de falsificación de solicitudes entre sitios -->
                      <!-- el token CSRF SE GENERA POR LARAVEL DE MANERA ALEATORIA PARA CADA INICIO DE SESIÓN Y SE COMPARA CON EL TOKEN ALMACENADO EN LA SESIÓN DEL USUARIO -->


                <!-- Campo: Nombre -->
                <div>
                    <label for="nombre" class="block font-semibold text-blue-700">Nombre</label>
                    <input 
                        type="text" 
                        name="nombre" 
                        id="nombre" 
                        class="form-input w-full rounded border-blue-300" 
                        value="{{ old('nombre') }}" 
                        required
                    >
                    @error('nombre') 
                        <span class="text-red-500 text-sm">c</span> 
                    @enderror
                </div>

                

                <!-- Campo: Correo -->
                <div>
                    <label for="correo" class="block font-semibold text-blue-700">Correo</label>
                    <input 
                        type="email" 
                        name="correo" 
                        id="correo" 
                        class="form-input w-full rounded border-blue-300" 
                        value="{{ old('correo') }}" 
                        required
                    >
                    <!--disponible desde laravel mismo -->
                    @error('correo') 
                        <span class="text-red-500 text-sm">{{ $message }}</span> 
                    @enderror
                </div>


                
                <!-- Campo: Teléfono -->
                <div>
                    <label for="telefono" class="block font-semibold text-blue-700">Teléfono</label>
                    <input 
                        type="text" 
                        name="telefono" 
                        id="telefono" 
                        class="form-input w-full rounded border-blue-300" 
                        value="{{ old('telefono') }}" 
                        required
                    >
                    @error('telefono') 
                        <span class="text-red-500 text-sm">{{ $message }}</span> 
                    @enderror
                </div>



                <!-- Campo: Título de la solicitud -->
                <div>
                    <label for="titulo" class="block font-semibold text-blue-700">Título</label>
                    <input 
                        type="text" 
                        name="titulo" 
                        id="titulo" 
                        class="form-input w-full rounded border-blue-300" 
                        value="{{ old('titulo') }}" 
                        required
                    >
                    @error('titulo') 
                        <span class="text-red-500 text-sm">{{ $message }}</span> 
                    @enderror
                </div>



                <!-- Campo: Descripción de la solicitud -->
                <div>
                    <label for="descripcion" class="block font-semibold text-blue-700">Descripción</label>
                    <textarea 
                        name="descripcion" 
                        id="descripcion" 
                        class="form-textarea w-full rounded border-blue-300" 
                        rows="4" 
                        required
                    >{{ old('descripcion') }}</textarea>
                    @error('descripcion') 
                        <span class="text-red-500 text-sm">{{ $message }}</span> 
                    @enderror
                </div>



                <!-- Botón de envío del formulario -->
                <button 
                    type="submit" 
                    class="bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded w-full font-bold text-white transition"
                >
                    Enviar
                </button>
            </form>



            <!-- Separador visual entre los dos formularios -->
            <div class="my-8 border-t border-gray-200"></div>



            <!-- Sección: Consulta de estado de solicitud por ID -->
            <h2 class="text-xl font-bold mb-4 text-blue-700 text-center">Conoce el estado de tu solicitud</h2>



            <!-- Formulario de consulta por ID -->
            <!-- se usa post por seguridad de info -->
            <form method="POST" action="{{ route('helpdesk.consulta') }}" class="mb-6">
                @csrf <!-- Token CSRF para protección -->



                <!-- Campo: ID de la solicitud a consultar -->
                <div class="mb-4">
                    <label for="consulta_id" class="block font-semibold text-blue-700">ID de Solicitud</label>
                    <input 
                        type="number" 
                        name="consulta_id" 
                        id="consulta_id" 
                        class="form-input w-full rounded border-blue-300" 
                        value="{{ old('consulta_id', $consulta_id) }}" 
                        required
                    >
                    @error('consulta_id') 
                        <span class="text-red-500 text-sm">{{ $message }}</span> 
                    @enderror
                </div>



                <!-- Botón de consulta -->
                <button 
                    type="submit" 
                    class="bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded w-full font-bold text-white transition"
                >
                    Consultar
                </button>
            </form>



            <!-- CONSULTA SOLICITUD -->
            <!-- Mostrar resultado de la consulta si se ha realizado -->
            <!--el if evalua respuesta null con la consulta, en caso de que no sea null se muestra -->
            @if(!is_null($consulta_id))
                @if($solicitud)
                    <!-- Mostrar datos de la solicitud encontrada -->
                    <div class="bg-blue-50 border border-blue-200 text-blue-800 p-4 rounded mb-4 space-y-1">
                        <strong>Solicitud #{{ $solicitud->id }}</strong><br>
                        <strong>Nombre:</strong> {{ $solicitud->nombre }}<br>
                        <strong>Correo:</strong> {{ $solicitud->correo }}<br>
                        <strong>Teléfono:</strong> {{ $solicitud->telefono }}<br>
                        <strong>Título:</strong> {{ $solicitud->titulo }}<br>
                        <strong>Descripción:</strong> {{ $solicitud->descripcion }}<br>
                        <strong>Estado:</strong> <span class="font-semibold">{{ ucfirst($solicitud->status) }}</span>
                    </div>
                @else
                    <!-- Mensaje si no se encontró la solicitud -->
                    <div class="bg-red-50 border border-red-200 text-red-700 p-4 rounded mb-4 text-center">
                        No se ha encontrado la solicitud con el ID <strong>{{ $consulta_id }}</strong>.
                    </div>
                @endif
            @endif


        </div> <!-- Fin del contenedor del formulario principal -->



    </div> <!-- Fin del contenedor principal de la página -->
    


</x-app-layout>