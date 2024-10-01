@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('posts.index') }}">Mi Blog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('posts.index') }}">Publicaciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('posts.create') }}">Crear Publicación</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white text-center">
                    {{ __('Funciones') }}
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h2 class="text-center text-white">¡Bienvenido a Mi Blog!</h2>
                    <p class="text-center text-white">Aquí puedes leer y crear publicaciones de manera sencilla y rápida.</p>

                    <div class="text-center mt-4">
                        <a href="{{ route('posts.index') }}" class="btn btn-outline-primary btn-lg me-2">Ver Publicaciones</a>
                        <a href="{{ route('posts.create') }}" class="btn btn-outline-success btn-lg">Crear Nueva Publicación</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<style>
    /* Imagen de fondo */
    body {
        background-image: url('{{ asset('public/images/luna.jpg') }}');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
    }

    /* Fondo semi-transparente para el contenedor */
    .card {
        background-color: rgba(0, 0, 0, 0.7);
    }

    /* Color de texto para el contenido */
    .text-white {
        color: white !important;
    }

    /* Estilos adicionales para mejorar la apariencia */
    .btn-outline-primary, .btn-outline-success {
        border-width: 2px;
    }
</style>
@endsection
