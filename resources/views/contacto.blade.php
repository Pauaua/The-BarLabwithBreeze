@extends('layout')

@section('content')
    <style>
        body {
            background: #380516 !important;
        }
        .elevacion {
            box-shadow: 0 8px 32px rgba(0,0,0,0.35), 0 1.5px 8px rgba(56,5,22,0.15);
            border-radius: 2rem;
        }
        .logo-barlab {
            display: block;
            margin: 2rem auto 1.5rem auto;
            max-width: 360px;
            width: 80vw;
            height: auto;
        }
        .quienes-section {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            padding-top: 80px;   /* Ajusta según la altura de tu navbar */
            padding-bottom: 80px;/* Ajusta según la altura de tu footer */
        }
        .quienes-bg {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            object-fit: cover;
            opacity: 0.45;
            border-radius: 2rem;
            z-index: 1;
        }
        .quienes-overlay {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(0,0,0,0.38);
            border-radius: 2rem;
            z-index: 2;
        }
        .quienes-content {
            position: relative;
            z-index: 3;
            width: 100%;
        }
        @media (max-width: 575.98px) {
            .quienes-section {
                padding-top: 60px;
                padding-bottom: 60px;
            }
            .elevacion, .quienes-bg, .quienes-overlay {
                border-radius: 0.7rem;
            }
        }
    </style>
    <div class="container-fluid px-0 quienes-section elevacion">
        <img src="assets/contacto1.jpg" class="quienes-bg" alt="Fondo Bar Lab">
        <div class="quienes-overlay"></div>
        <div class="quienes-content d-flex flex-column justify-content-center align-items-center text-center">
            <h1 class="fw-bold text-white mb-4 text-center" style="font-size:3.2rem; letter-spacing:2px; text-shadow:3px 3px 16px #000;">
                📞 Contacto
            </h1>
            <br><br>
            <p class="text-white mb-4 fs-4 text-center" style="max-width:700px; margin:auto; text-shadow:2px 2px 8px #000;">
                ¿Tienes dudas? ¿Quieres inscribirte en uno de nuestros cursos o recibir más información?  ¡Estamos aquí para ayudarte!
                <br><br>
             📍 Dirección:<br> Av. Av. Alameda Libertador Bernardo O'Higgins 2221, 8340606 Santiago, Región Metropolitana <br><br>
             📧 Correo electrónico:<br>info@thebarlabacademy.cl contacto@thebarlabacademy.cl <br><br>
             📱 Teléfono / WhatsApp:<br>+56 9 1234 5678 <br><br>
             ⏰ Horario de atención:<br>Lunes a Viernes — 10:00 a 18:00 hrs  Sábados — 10:00 a 14:00 hrs <br><br>
             📲 Redes Sociales:<br>Instagram: @thebarlabacademy  Facebook: The Bar Lab Academy  TikTok: @thebarlabacademy  LinkedIn: The Bar Lab Academy
            </p>
            <img class="logo-barlab" src="assets/logo5.png" alt="logo">
        </div>
    </div>
    
@endsection