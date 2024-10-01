<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Blog - Estilo Fantasía</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts para una tipografía fantasiosa -->
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">

    <!-- Estilos personalizados -->
    <style>
        /* Fondo personalizado */
        body {
            background-image: url('images/luna1.png'); /* Asegúrate de tener la imagen en la ruta correcta */
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: white;
            font-family: 'Lobster', cursive;
            margin: 0;
            padding: 0;
        }

        /* Estilo para el contenedor principal */
        .container-custom {
            background-color: rgba(0, 0, 0, 0.7); /* Fondo oscuro semi-transparente */
            padding: 20px;
            border-radius: 10px;
            margin-top: 30px;
        }

        /* Estilo para la barra de navegación */
        .navbar-custom {
            background-color: rgba(0, 0, 0, 0.9);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
        }

        .navbar-brand {
            font-size: 2rem;
            color: white;
        }

        .nav-link {
            color: white !important;
            font-size: 1.2rem;
        }

        /* Estilo para las tablas */
        .table {
            background-color: white;
            color: black;
            border-radius: 8px;
            overflow: hidden;
        }

        /* Botones flotantes con sombra */
        .btn {
            margin-right: 5px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.3);
        }

        /* Efecto hover en los botones */
        .btn:hover {
            transform: translateY(-5px);
            transition: transform 0.2s ease-in-out;
        }

        /* Texto del título estilizado */
        h1 {
            text-align: center;
            font-size: 3rem;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
        }

        /* Bordes decorativos para las publicaciones */
        .post-card {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            margin-bottom: 20px;
            padding: 15px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
            position: relative;
            overflow: hidden;
        }

        /* Pequeños detalles gráficos para mejorar el estilo */
        .post-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('images/rama-decorativa.png') no-repeat;
            background-size: 100px 100px;
            opacity: 0.5;
        }
    </style>
</head>
<body>

    <!-- Barra de Navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Mi Blog </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('posts.index') }}">Publicaciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('posts.create') }}">Crear Publicación</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenedor Principal -->
    <div class="container container-custom">
        <h1>Listado de Publicaciones</h1>

        <!-- Botón para crear una nueva publicación -->
        <div class="text-center mb-4">
            <a href="{{ route('posts.create') }}" class="btn btn-primary btn-lg">Crear Nueva Publicación</a>
        </div>

        <!-- Mensaje de éxito -->
        @if (session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        <!-- Tabla de Publicaciones -->
        <table class="table table-hover text-center">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td>
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
