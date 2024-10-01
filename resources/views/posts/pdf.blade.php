<!DOCTYPE html>
<html>
<head>
    <title>{{ $post->title }}</title>
</head>
<body>
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>
    <p>Categoría: {{ $post->category }}</p>
    <p>Etiquetas: {{ $post->tags }}</p>
</body>
</html>
