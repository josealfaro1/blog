<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Barryvdh\DomPDF\Facade\Pdf;

class PostController extends Controller
{
    /**
     * Mostrar un listado de las publicaciones.
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    /**
     * Mostrar el formulario para crear una nueva publicación.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Almacenar una nueva publicación en la base de datos.
     */
    public function store(Request $request)
    {
        // Verifica si el usuario está autenticado
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Debes estar autenticado para crear una publicación.');
        }

        // Validar los datos del formulario
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category' => 'required|max:255',
            'tags' => 'nullable|max:255',
        ]);

        // Crear la nueva publicación
        Post::create([
            'title' => $validatedData['title'],
            'content' => $validatedData['content'],
            'category' => $validatedData['category'],
            'tags' => $validatedData['tags'],
            'user_id' => auth()->id(),  // Obtener el ID del usuario autenticado
        ]);

        // Redirigir al listado de publicaciones con un mensaje de éxito
        return redirect()->route('posts.index')->with('success', 'Publicación creada con éxito.');
    }

    /**
     * Mostrar una publicación específica.
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Mostrar el formulario para editar una publicación.
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    /**
     * Actualizar una publicación específica.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category' => 'required|max:255',
            'tags' => 'nullable|max:255',
        ]);

        $post = Post::findOrFail($id);
        $post->update($request->all());

        return redirect()->route('posts.index')->with('success', 'Publicación actualizada correctamente.');
    }

    /**
     * Eliminar una publicación específica.
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Publicación eliminada correctamente.');
    }

    /**
     * Exportar una publicación en formato PDF.
     */
    public function exportPdf(Post $post)
    {
        $pdf = Pdf::loadView('posts.pdf', compact('post'));
        return $pdf->download('post.pdf');
    }
}
