<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de la Publicación - Estilo Fantasía</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">

    <!-- Estilos personalizados -->
    <style>
        /* Fondo y estilo de texto */
        body {
            background-image: url('images/luna.jfif'); /* Cambia la ruta según la imagen que desees */
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            font-family: 'Lobster', cursive;
            color: white;
        }

        /* Estilo para el contenedor */
        .container-custom {
            background-color: rgba(0, 0, 0, 0.7); /* Fondo oscuro semi-transparente */
            padding: 30px;
            border-radius: 10px;
            margin-top: 50px;
        }

        /* Título estilizado */
        h1 {
            text-align: center;
            font-size: 3rem;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
            color: #ffdb58;
        }

        /* Estilo para los botones */
        .btn-custom {
            margin-right: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s;
        }

        .btn-custom:hover {
            transform: translateY(-5px);
        }

        /* Estilo para las tarjetas de comentario */
        .list-group-item {
            background-color: rgba(255, 255, 255, 0.8);
            color: black;
            border-radius: 8px;
            margin-bottom: 10px;
            padding: 15px;
        }

        /* Estilo para el formulario de comentarios */
        textarea {
            border-radius: 8px;
            padding: 10px;
        }

        /* Estilo para el botón de enviar comentario */
        button[type="submit"] {
            margin-top: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s;
        }

        button[type="submit"]:hover {
            transform: translateY(-5px);
        }

        /* Pequeños detalles gráficos */
        .post-decorative {
            border-left: 4px solid #ffdb58;
            padding-left: 15px;
        }

    </style>
</head>
<body>

    <div class="container container-custom">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <!-- Título de la publicación -->
                <h1>{{ $post->title }}</h1>

                <div class="post-decorative">
                    <!-- Categoría y etiquetas -->
                    <p><strong>Categoría:</strong> {{ $post->category }}</p>
                    <p><strong>Etiquetas:</strong> {{ $post->tags }}</p>

                    <!-- Contenido de la publicación -->
                    <p><strong>Contenido:</strong></p>
                    <p>{{ $post->content }}</p>
                </div>

                <!-- Botones de acciones -->
                <div class="mt-4">
                    <a href="{{ route('posts.index') }}" class="btn btn-secondary btn-lg btn-custom">Volver al Listado</a>
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-lg btn-custom">Editar Publicación</a>

                    <!-- Botón para eliminar la publicación -->
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-lg btn-custom">Eliminar Publicación</button>
                    </form>

                    <!-- Botón para exportar PDF -->
                    <a href="{{ route('posts.exportPdf', $post->id) }}" class="btn btn-info btn-lg btn-custom">Exportar a PDF</a>
                </div>

                <hr class="mt-5">

                <!-- Sección de comentarios -->
                <h3 class="text-warning">Comentarios</h3>

                @if ($post->comments->count())
                    <ul class="list-group mb-4">
                        @foreach ($post->comments as $comment)
                            <li class="list-group-item">
                                <strong>{{ $comment->user->name }}:</strong> 
                                {{ $comment->content }} 
                                <br>
                                <small class="text-muted">Publicado el {{ $comment->created_at->format('d/m/Y') }}</small>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p>No hay comentarios.</p>
                @endif

                <!-- Formulario para agregar comentarios -->
                <h4 class="text-warning">Agregar un comentario</h4>

                @if (Auth::check())
                    <form action="{{ route('comments.store', $post->id) }}" method="POST">
                        @csrf

                        <div class="form-group mb-3">
                            <textarea class="form-control" name="content" rows="3" required placeholder="Escribe tu comentario aquí..."></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary btn-custom">Enviar Comentario</button>
                    </form>
                @else
                    <p><a href="{{ route('login') }}" class="text-warning">Inicia sesión</a> para dejar un comentario.</p>
                @endif
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
