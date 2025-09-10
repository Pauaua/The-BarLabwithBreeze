<!-- resources/views/components/navbar.blade.php -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="/">
            <img src="{{ asset('assets/logo5.png') }}" alt="Logo The Bar Lab" style="height: 48px;" class="me-2">
            <span>The Bar Lab</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/nosotros">¿Quiénes Somos?</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownCursos" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Cursos
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdownCursos">
                        <li><a class="dropdown-item" href="/cursos">Cursos</a></li>
                        <li><a class="dropdown-item" href="/curso-detalle">Bartender Profesional</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contacto">Contacto</a>
                </li>

                @if (Route::has('login'))
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Inicia Sesión</a>
                        </li>
                        
                    @endauth
                @endif
            </ul>
        </div>
    </div>
</nav>