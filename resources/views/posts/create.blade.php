<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nueva Publicación</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="mb-4">Crear Nueva Publicación</h1>

                <!-- Mostrar mensajes de error -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Formulario para crear una publicación -->
                <form action="{{ route('posts.store') }}" method="POST">
    @csrf  <!-- Protección contra ataques CSRF -->

    <!-- Título -->
    <div class="mb-3">
        <label for="title" class="form-label">Título</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
    </div>

    <!-- Contenido -->
    <div class="mb-3">
        <label for="content" class="form-label">Contenido</label>
        <textarea class="form-control" id="content" name="content" rows="5" required>{{ old('content') }}</textarea>
    </div>

    <!-- Categoría -->
    <div class="mb-3">
        <label for="category" class="form-label">Categoría</label>
        <input type="text" class="form-control" id="category" name="category" value="{{ old('category') }}" required>
    </div>

    <!-- Etiquetas -->
    <div class="mb-3">
        <label for="tags" class="form-label">Etiquetas (separadas por comas)</label>
        <input type="text" class="form-control" id="tags" name="tags" value="{{ old('tags') }}">
    </div>

    <!-- Botón para enviar el formulario -->
    <button type="submit" class="btn btn-primary">Crear Publicación</button>
    <a href="{{ route('posts.index') }}" class="btn btn-secondary">Volver al Listado</a>
</form>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
