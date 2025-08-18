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
        <img src="assets/nosotros1.jpeg" class="quienes-bg" alt="Fondo Bar Lab">
        <div class="quienes-overlay"></div>
        <div class="quienes-content d-flex flex-column justify-content-center align-items-center text-center">
            <h1 class="fw-bold text-white mb-4 text-center" style="font-size:3.2rem; letter-spacing:2px; text-shadow:3px 3px 16px #000;">
                Quienes Somos?
            </h1>
            <br><br>
            <p class="text-white mb-4 fs-4 text-center" style="max-width:700px; margin:auto; text-shadow:2px 2px 8px #000;">
                En The Bar Lab Academy, somos una academia especializada en el arte de la coctelería moderna. Nuestra misión es formar a los nuevos referentes del mundo del bar, combinando creatividad, técnica y ciencia líquida. Creemos que detrás de cada cóctel hay una fórmula perfecta, y nosotros te enseñamos a descubrirla.<br><br>
                Nuestro equipo está conformado por bartenders profesionales, mixólogos innovadores y expertos en hospitalidad, comprometidos con entregar una formación de calidad, dinámica y alineada con las tendencias internacionales. Ya sea que estés comenzando desde cero o buscando perfeccionar tus habilidades, aquí encontrarás un espacio donde la pasión por el bar se transforma en una profesión.<br><br>
                En The Bar Lab Academy, cada clase es una experiencia, cada bebida un experimento, y cada estudiante, un futuro maestro de la barra.
            </p>
            <img class="logo-barlab" src="assets/logo5.png" alt="logo">
        </div>
    </div>
    
@endsection