<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bartender Profesional | The Bar Lab</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <style>
        body {
            background: #02110C;
            color: #e0e0e0;
        }
        .navbar-custom {
            background: #02110C;
        }
        .navbar-brand span {
            font-weight: bold;
            font-size: 1.3rem;
            letter-spacing: 1px;
        }
        .section-gold {
            background: #A2845E;
            color: #fff;
        }
        .section-maroon {
            background: #2a0012;
            color: #e0e0e0;
        }
        .section-gold h2,
        .section-gold h4,
        .section-gold p {
            color: #fff;
        }
        .section-maroon h3,
        .section-maroon h5,
        .section-maroon p {
            color: #e0e0e0;
        }
        .feature-img {
            object-fit: cover;
            width: 100%;
            height: 300px; /* Aumenta la altura aquí */
            border-radius: 0.5rem;
        }
        @media (max-width: 767.98px) {
            .feature-img {
                height: 140px; /* Ajusta para móviles si lo deseas */
            }
        }
        .feature-box {
            margin-bottom: 1.5rem;
        }
        .cta-section {
            background: #A2845E;
            color: #fff;
            padding: 2rem 0 1.5rem 0;
            text-align: center;
        }
        .cta-section .btn {
            background: #02110C;
            color: #fff;
            border: none;
            font-weight: 600;
            letter-spacing: 1px;
            margin-top: 1rem;
        }
        .footer-custom {
            background: #02110C;
            color: #e0e0e0;
            padding: 2rem 0 1rem 0;
        }
        .footer-custom .footer-logo {
            font-size: 1.5rem;
            font-weight: bold;
            letter-spacing: 2px;
        }
        .footer-custom a {
            color: #e0e0e0;
            text-decoration: none;
            margin: 0 0.5rem;
        }
        .footer-custom a:hover {
            color: #A2845E;
        }
        .divider-gold {
            height: 6px;
            background: #A2845E;
            border: none;
            margin: 0;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
     @include('Components/navbar')

    <!-- Hero Section -->
    <section class="section-gold py-4">
        <div class="container">
            <h2 class="text-center fw-bold mb-4">Conviértete en un Bartender Profesional</h2>
            <div class="row align-items-center">
                <div class="col-md-4 mb-3 mb-md-0">
                    <img src="assets/bartender1.jpg" alt="Bartender Profesional" class="img-fluid rounded">
                </div>
                <div class="col-md-8">
                    <p class="fs-5 mb-0">
                        ¿Te apasiona el mundo de la coctelería?<br>
                        ¿Sueñas con crear bebidas espectaculares y ser el alma de cada evento?<br>
                        ¡Si quieres llevar tus habilidades al siguiente nivel y abrirte puertas en la vibrante industria de bares y restaurantes, nuestro curso de Bartender Profesional es para ti!
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Section -->
    <section class="section-maroon py-4">
        <div class="container">
            <h3 class="text-center fw-bold mb-4">¿Por qué elegir nuestro curso?</h3>
            <div class="row mb-4">
                <div class="col-12">
                    <p>
                        En este programa intensivo y completo, aprenderás de la mano de expertos mixólogos todo lo que necesitas para destacar en el arte de la barra. Desde las bases fundamentales hasta las técnicas más avanzadas, te equiparemos con el conocimiento y la práctica necesarios para triunfar:
                    </p>
                </div>
            </div>
            <div class="row g-4 flex-column">
                <!-- 1 -->
                <div class="col-12">
                    <div class="row flex-lg-row flex-column align-items-center">
                        <div class="col-lg-7 mb-3 mb-lg-0">
                            <p class="mb-2 fs-5">
                                <span class="fw-bold">Dominarás los Clásicos y las Tendencias:</span><br>
                                Aprenderás a preparar los cócteles más icónicos, así como las últimas innovaciones en mixología.
                            </p>
                            <p class="fs-5">
                                <span class="fw-bold">Conocerás a Fondo cada Ingrediente:</span><br>
                                Desde licores y destilados hasta jarabes y bitters, entenderás cómo cada componente influye en el sabor y la armonía de tus creaciones.
                            </p>
                        </div>
                        <div class="col-lg-5 d-flex justify-content-center">
                            <img src="assets/bartender2.jpg" alt="Clásicos y Tendencias" class="feature-img w-100" style="max-width:350px;">
                        </div>
                    </div>
                </div>
                <!-- 2 -->
                <div class="col-12">
                    <div class="row flex-lg-row flex-column align-items-center">
                        <div class="col-lg-5 d-flex justify-content-center">
                            <img src="assets/bartender3.jpg" alt="Habilidades Técnicas" class="feature-img w-100" style="max-width:350px;">
                        </div>
                        <div class="col-lg-7 mb-3 mb-lg-0">
                            <p class="mb-2 fs-5">
                                <span class="fw-bold">Perfeccionarás tus Habilidades Técnicas:</span><br>
                                Dominarás el flair, el uso de herramientas profesionales, técnicas de enfriamiento, maceración, infusionado y mucho más.
                            </p>
                            <p class="fs-5">
                                <span class="fw-bold">Desarrollarás tu Creatividad:</span> Te guiaremos para que puedas diseñar tus propios cócteles de autor, experimentando con sabores y texturas únicas.
                            </p>
                        </div>
                        
                    </div>
                </div>
                <!-- 3 -->
                <div class="col-12">
                    <div class="row flex-lg-row flex-column align-items-center">
                        <div class="col-lg-7 mb-3 mb-lg-0">
                            <p class="mb-2 fs-5">
                                <span class="fw-bold">Obtendrás Conocimientos Operativos:</span><br>
                                Aprenderás sobre gestión de inventario, servicio al cliente de excelencia, seguridad e higiene en la barra, y cómo manejar situaciones comunes en un ambiente profesional.
                            </p>
                            <p class="fs-5">
                                <span class="fw-bold">Construirás tu Marca Personal:</span> Te daremos las herramientas para que te conviertas en un bartender reconocido, con una sólida ética de trabajo y pasión por lo que haces.
                            </p>
                        </div>
                        <div class="col-lg-5 d-flex justify-content-center">
                            <img src="assets/bartender4.jpg" alt="Operativos" class="feature-img w-100" style="max-width:350px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="cta-section">
        <div class="container">
            <h4 class="fw-bold mb-2">¡No esperes más para construir la carrera de tus sueños!</h4>
            <p class="mb-2">
                Inscríbete hoy y da el primer paso para convertirte en un Bartender Profesional altamente calificado y cotizado.<br>
                ¡Te esperamos en la barra para empezar esta emocionante aventura juntos!
            </p>
            <a href="/registro" class="btn btn-lg rounded-pill px-5">INSCRIBIRME</a>
        </div>
    </section>

    <!-- Footer -->
    @include('Components/footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>