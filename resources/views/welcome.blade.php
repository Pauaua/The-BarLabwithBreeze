<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>The Bar-Lab</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
        <!-- Styles / Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
            <style>
        body {
            background: #380516;
        }
        .navbar, .bg-dark, .footer-custom {
            background-color: #02110C !important;
        }
        .navbar-brand span {
            font-weight: bold;
            font-size: 1.3rem;
            letter-spacing: 1px;
        }
        .hero-slider {
            background: #fff;
            min-height: 480px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }
        .hero-slider img,
        .carousel-inner .carousel-item img {
            max-width: 100%;
            max-height: 850px;
            min-height: 850px;
            object-fit: cover;
            opacity: 0.7;
        }
        .hero-slider .btn,
        .carousel-caption .btn {
            position: absolute;
            bottom: 2.5rem;
            left: 50%;
            transform: translateX(-50%);
            background: #02110C;
            color: #e0e0e0;
            border-radius: 2.5rem;
            font-weight: 700;
            font-size: 1.5rem;
            padding: 1rem 3rem;
            box-shadow: 0 4px 24px rgba(0,0,0,0.15);
            z-index: 10;
            text-align: center;
        }
        .carousel-caption {
            left: 50% !important;
            transform: translateX(-50%) !important;
            width: auto;
            bottom: 2.5rem;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .section-title {
            color: #e0e0e0;
            font-weight: 700;
            letter-spacing: 1px;
            margin-bottom: 1.5rem;
        }
        .courses-section {
            background: #380516;
            border-radius: 0 0 0 0;
            padding: 2rem 0 1.5rem 0;
        }
        .course-card {
            background: #19141a;
            border-radius: 0.5rem;
            overflow: hidden;
            position: relative;
            margin-bottom: 1.5rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.10);
            min-height: 320px;
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        .course-card img {
            width: 100%;
            height: 100%;
            min-height: 320px;
            max-height: 320px;
            object-fit: cover;
            opacity: 0.7;
            display: block;
            border-radius: 0.5rem 0.5rem 0 0;
            flex-shrink: 0;
        }
        .course-card .card-body {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 0.75rem 1rem;
            background: rgba(0,0,0,0.45);
            color: #e0e0e0;
            border-radius: 0 0 0.5rem 0.5rem;
        }
        .course-card .card-title {
            font-size: 1rem;
            font-weight: 700;
            margin-bottom: 0.25rem;
        }
        .course-card .card-text {
            font-size: 0.85rem;
            color: #e0e0e0;
        }
        .footer-social a {
            color: #e0e0e0;
            margin: 0 0.5rem;
            transition: color 0.2s;
            font-size: 1.2rem;
            text-decoration: none;
        }
        .footer-social a:hover {
            color: #e0e0e0;
        }
        @media (max-width: 767.98px) {
            .hero-slider img {
                max-height: 120px;
            }
            .courses-section {
                padding: 1rem 0 1rem 0;
            }
            .course-card img {
                min-height: 140px;
                max-height: 140px;
            }
            .course-card {
                min-height: 200px;
            }
        }
        .h3 {
            color: #e0e0e0;
        }
    </style>

    </head>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
        @include('components.navbar')
        @include('components.modal')
<!-- Hero Cover -->
    <div class="container-fluid px-0">
        <div class="position-relative" style="min-height: 100vh;">
            <img src="assets/bartender1.jpg" class="w-100 h-100 position-absolute top-0 start-0" style="object-fit: cover; min-height: 100vh; max-height: 100vh; opacity: 0.45; z-index: 1;" alt="Fondo Bar Lab">
            <div class="position-absolute top-0 start-0 w-100 h-100" style="background: rgba(0,0,0,0.7); z-index: 2;"></div>
            <div class="position-absolute top-50 start-50 translate-middle w-100" style="z-index: 3;">
                <div class="container d-flex flex-column justify-content-center align-items-center text-center">
                    <h1 class="fw-bold text-white mb-4 text-center" style="font-size:3.2rem; letter-spacing:2px; text-shadow:3px 3px 16px #000;">
                        ¡Bienvenido a The Bar Lab!
                    </h1>
                    <p class="text-white mb-4 fs-4 text-center" style="max-width:700px; margin:auto; text-shadow:2px 2px 8px #000;">
                        Donde la pasión, la creatividad y la excelencia se mezclan para formar a los mejores bartenders. 
                        Prepárate para transformar tu futuro, dominar el arte de la coctelería y vivir una experiencia única en la academia líder de Chile y Latinoamérica.
                    </p>
                    <a href="#curso" class="btn px-5 py-3 fw-bold fs-4 rounded-2 shadow" style="letter-spacing:1px; background:#A2845E; color:#fff; border:none;">DESCUBRE NUESTROS CURSOS</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Cursos Section -->
    <section class="courses-section">
        <div id="curso" class="container">
            <h3 class="text-center section-title">NUESTROS CURSOS</h3>
            <div class="row">
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="course-card">
                        <img src="assets/bartender1.jpg" alt="Bartender Profesional">
                        <div class="card-body text-center">
                            <div class="card-title">Bartender Profesional</div>
                            <a href="/curso-detalle" class="btn btn-outline-light btn-sm mt-2 mx-auto d-inline-block">Ver Más</a>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="course-card">
                        <img src="assets/bartender2.jpg" alt="Curso Barista">
                        <div class="card-body text-center">
                            <div class="card-title">Curso Barista</div>
                            <a href="#" class="btn btn-outline-light btn-sm mt-2 mx-auto d-inline-block">Ver Más</a>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="course-card">
                        <img src="assets/bartender3.jpg" alt="Curso de Fermentación">
                        <div class="card-body text-center">
                            <div class="card-title">Curso de Fermentación</div>
                            <a href="#" class="btn btn-outline-light btn-sm mt-2 mx-auto d-inline-block">Ver Más</a>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="course-card">
                        <img src="assets/bartender4.jpg" alt="Curso de Destilación">
                        <div class="card-body text-center">
                            <div class="card-title">Curso de Destilación</div>
                            <a href="#" class="btn btn-outline-light btn-sm mt-2 mx-auto d-inline-block">Ver Más</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-4">
                <a href="/cursos" class="btn btn-lg px-5 py-3 fw-bold rounded-2 shadow" style="background:#A2845E; color:#fff; border:none; letter-spacing:1px;">
                    VER TODOS LOS CURSOS
                </a>
            </div>
        </div>
    </section>


        @if (Route::has('login'))
            <div class="h-14.5 hidden lg:block"></div>
        @endif
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
