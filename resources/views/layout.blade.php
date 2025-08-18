<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>The Bar Lab - Academia de Bar</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        html, body {
            height: 100%;
        }
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        main {
            flex: 1 0 auto;
        }
        .footer-custom {
            flex-shrink: 0;
        }
        body {
            background-color: #A2845E;
            font-family: 'Arial', sans-serif;
        }
        .hero-bg {
            background: linear-gradient(120deg, #380516 60%, #02110C 100%);
            color: #fff;
            border-radius: 1rem;
            box-shadow: 0 8px 32px rgba(0,0,0,0.15);
        }
        .hero-title {
            font-weight: 800;
            letter-spacing: 1px;
            text-shadow: 2px 2px 8px #00000055;
        }
        .hero-btn {
            background: #02110C;
            color: #e0e0e0;
            border: none;
            font-weight: 700;
            font-size: 1.2rem;
            padding: 0.75rem 2rem;
            border-radius: 2rem;
            box-shadow: 0 4px 16px rgba(0,0,0,0.10);
            transition: background 0.2s, color 0.2s, transform 0.2s;
        }
        .hero-btn:hover {
            background: #02110C;
            color: #fff;
            transform: scale(1.05);
        }
        .navbar, .bg-dark, .footer-custom {
            background-color: #02110C !important;
        }
        .navbar-brand span {
            font-weight: bold;
            font-size: 1.7rem;
            letter-spacing: 1px;
        }
        .footer-social a {
            color: #e0e0e0;
            margin: 0 0.5rem;
            transition: color 0.2s;
            font-size: 1.2rem;
        }
        .footer-social a:hover {
            color: #fff;
        }
        .navbar {
            box-shadow: 0 2px 8px rgba(0,0,0,0.10);
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    @include('Components/navbar')
    <main class="container my-5">
        @yield('content')
    </main>  
    <!-- Footer -->
     @include('Components/footer')  
<!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</body>
</html>