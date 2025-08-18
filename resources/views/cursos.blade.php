<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursos | The Bar Lab</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
        }
        body {
            background: #A2845E;
            color: #fff;
        }
        .navbar, .bg-dark, .footer-custom {
            background-color: #02110C !important;
        }
        .navbar-brand span {
            font-weight: bold;
            font-size: 1.3rem;
            letter-spacing: 1px;
        }
        .section-title {
            background: #A2845E;
            color: #fff;
            padding: 2rem 0 1.5rem 0;
            margin-bottom: 0;
            font-size: 2rem;
            font-weight: normal;
            text-align: center;
            letter-spacing: 1px;
        }
        .courses-section {
            background: #A2845E;
            padding: 0;
            flex: 1 0 auto;
        }
        .courses-inner {
            background: #380516;
            border-radius: 0.5rem;
            padding: 2.5rem 1rem 2.5rem 1rem;
            max-width: 900px;
            margin: 0 auto 3rem auto;
        }
        .course-card {
            background: transparent;
            border: none;
            box-shadow: none;
            margin-bottom: 2rem;
            transition: transform 0.2s;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center; /* <-- centra el texto */
        }
        .course-card img {
            width: 180px;
            height: 180px;
            object-fit: cover;
            opacity: 0.7;
            border-radius: 4px;
        }
        .course-title {
            font-size: 1.1rem;
            font-weight: bold;
            color: #e0e0e0;
            text-shadow: 1px 1px 6px #000;
            margin-bottom: 0;
            margin-top: 0.5rem;
            text-align: center; /* <-- centra el texto */
            width: 100%;
        }
        .course-title span {
            font-size: 0.9em;
            font-weight: 400;
            display: block;
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
        .study-hero {
            text-align: center;
            margin-bottom: 2.5rem;
        }
        .study-hero h1 {
            display: inline-block;
            width: 100%;
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }
        .study-hero p {
            display: inline-block;
            width: 100%;
            font-size: 1.2rem;
            margin: 0 0 2.5rem 0; /* agrega espacio inferior */
        }
        .course-link {
            text-decoration: none;
            color: inherit;
            transition: transform 0.2s cubic-bezier(.68,-0.55,.27,1.55), box-shadow 0.2s;
            display: block;
            border-radius: 8px;
        }
        .course-link:hover .course-card,
        .course-link:focus .course-card {
            transform: scale(1.07) rotate(-2deg);
            box-shadow: 0 8px 32px 0 rgba(255,255,255,0.15), 0 1.5px 8px 0 #e0e0e0;
            background: #380516;
            cursor: pointer;
            transition: transform 0.2s cubic-bezier(.68,-0.55,.27,1.55), box-shadow 0.2s;
        }
        .course-link:hover .course-title,
        .course-link:focus .course-title {
            color: #e0e0e0;
            text-shadow: 0 2px 8px #fff, 0 0 2px #e0e0e0;
            transition: color 0.2s, text-shadow 0.2s;
        }
        .course-link:active .course-card {
            transform: scale(0.97) rotate(1deg);
        }
        .footer-custom {
            flex-shrink: 0;
        }
    </style>
</head>
<body>
    @include('Components/navbar')
    <div class="section-title">
    </div>
    <div class="study-hero">
    <section class="courses-section">
        <div class="courses-inner">
            <h1>ESTUDIA CON NOSOTROS</h1>
            <p>Conviértete en bartender y descubre el fascinante mundo de la coctelería junto a TheBarLab</p>
            <div class="container-fluid">
                <div class="row g-4 justify-content-center">
                    <div class="col-12 col-sm-4">
                        <a href="/curso-detalle" class="course-link">
                            <div class="course-card">
                                <img src="assets/bartender1.jpg" alt="Bartender Profesional">
                                <div class="course-title">Bartender Profesional</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-sm-4">
                        <a href="/cursos" class="course-link">
                            <div class="course-card">
                                <img src="assets/bartender2.jpg" alt="Curso Barista">
                                <div class="course-title">Curso Barista</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-sm-4">
                        <a href="/cursos" class="course-link">
                            <div class="course-card">
                                <img src="assets/bartender3.jpg" alt="Curso de Fermentación">
                                <div class="course-title">Curso de Fermentación</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-sm-4">
                        <a href="/cursos" class="course-link">
                            <div class="course-card">
                                <img src="assets/bartender4.jpg" alt="Curso de Destilación">
                                <div class="course-title">Curso de Destilación</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-sm-4">
                        <a href="/cursos" class="course-link">
                            <div class="course-card">
                                <img src="assets/bartender5.jpg" alt="Bartender Profesional">
                                <div class="course-title">Bartender Profesional</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-sm-4">
                        <a href="/cursos" class="course-link">
                            <div class="course-card">
                                <img src="assets/bartender6.png" alt="Bar Academy On Tour">
                                <div class="course-title">Especialización en Cerveza</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-sm-4">
                        <a href="/cursos" class="course-link">
                            <div class="course-card">
                                <img src="assets/bartender7.jpg" alt="Master en Mixología">
                                <div class="course-title">Master en Mixología</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-sm-4">
                        <a href="/cursos" class="course-link">
                            <div class="course-card">
                                <img src="assets/bartender8.jpg" alt="Bar Foodie">
                                <div class="course-title">Bar Foodie</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-sm-4">
                        <a href="/cursos" class="course-link">
                            <div class="course-card">
                                <img src="assets/bartender9.jpg" alt="Curso Inicial de Vinos">
                                <div class="course-title">Curso Inicial de Vinos</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('Components/footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>