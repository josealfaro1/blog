<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Blog - Sol</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Google Fonts para una tipografía fantasiosa -->
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">

    <!-- Estilos personalizados -->
    <style>
        /* Fondo personalizado */
        body {
            background-image: url('/images/luna1.png'); /* Ruta correcta desde la carpeta public */
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: white;
            font-family: 'Lobster', cursive;
            margin: 0;
            padding: 0;
        }

        /* Estilo para el contenedor principal */
        .content-container {
            background-color: rgba(255, 255, 255, 0.8); /* Fondo blanco semitransparente para el contenido */
            padding: 20px;
            border-radius: 10px;
            margin-top: 30px;
        }

        /* Estilo para el botón de cerrar sesión */
        .btn-logout {
            position: absolute;
            top: 10px;
            right: 10px;
        }
    </style>
</head>
<body>

    <!-- Contenedor principal -->
    <div class="container content-container">
        @yield('content')
    </div>

    <!-- Botón de cerrar sesión -->
    @if (Auth::check())
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-danger btn-logout">
            Cerrar Sesión
        </a>
    @endif

    <!-- Bootstrap JS (opcional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
