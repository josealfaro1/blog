<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;

// Ruta para la página de inicio
Route::get('/', function () {
    return view('welcome');
});

// Rutas de autenticación
Auth::routes();

// Ruta para el home
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Rutas de recursos para las publicaciones
Route::resource('posts', PostController::class);

// Ruta para agregar comentarios a las publicaciones
Route::post('posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');

// Ruta para exportar publicaciones en formato PDF
Route::get('posts/{post}/export-pdf', [PostController::class, 'exportPdf'])->name('posts.exportPdf');

// Otras rutas que puedes necesitar (ajusta según sea necesario)
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create'); // Mostrar el formulario para crear una nueva publicación
Route::post('/posts', [PostController::class, 'store'])->name('posts.store'); // Guardar la nueva publicación
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit'); // Mostrar el formulario para editar una publicación
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update'); // Actualizar la publicación
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy'); // Eliminar la publicación
Auth::routes();


// Otras rutas...

// Ruta para almacenar un comentario
Route::post('posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
// Ruta para el home
Route::get('/home', [HomeController::class, 'index'])->name('home');
// Ruta para el home
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Rutas de autenticación generadas por Auth
Auth::routes();

// Ruta para cerrar sesión
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
// Ruta para el home
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Rutas de autenticación generadas por Auth
Auth::routes();

// Ruta para cerrar sesión
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
