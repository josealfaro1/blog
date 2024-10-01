<!-- show.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>

    <!-- Mostrar comentarios -->
    <h3>Comentarios</h3>
    @foreach ($post->comments as $comment)
        <p>{{ $comment->content }} - <small>{{ $comment->user->name }}</small></p>
    @endforeach

    <!-- Formulario para agregar comentarios -->
    @if (Auth::check())
        <form action="{{ route('comments.store', $post->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="content" class="form-label">Agregar Comentario</label>
                <textarea name="content" class="form-control" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Comentar</button>
        </form>
    @else
        <p><a href="{{ route('login') }}">Inicia sesión</a> para comentar.</p>
    @endif
@endsection
