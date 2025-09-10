<!-- resources/views/components/help-desk-banner.blade.php -->
<section class="bg-gradient-to-r from-blue-600 to-indigo-800 text-white py-16 px-6 rounded-lg shadow-lg mt-8 text-center">
    <div class="max-w-3xl mx-auto">
        <h2 class="text-3xl md:text-4xl font-bold mb-4">
            ¿Tienes una pregunta o necesitas ayuda?
        </h2>
        <p class="text-lg opacity-90 mb-6">
            Nuestro equipo está listo para ayudarte. Envíanos tu consulta y te responderemos lo antes posible.
        </p>
        <a href="{{ route('helpdesk.create') }}" 
           class="inline-block bg-white text-blue-700 font-semibold px-8 py-3 rounded-full hover:bg-gray-200 transition transform hover:scale-105 shadow-md">
            Ir a la Mesa de Ayuda
        </a>
    </div>
</section>