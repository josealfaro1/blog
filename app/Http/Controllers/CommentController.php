<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Guardar un nuevo comentario.
     */
    public function store(Request $request, $postId)
    {
        // Validar los datos del formulario de comentario
        $request->validate([
            'content' => 'required|max:500',
        ]);

        // Encontrar la publicación asociada
        $post = Post::findOrFail($postId);

        // Crear el comentario y asociarlo a la publicación y al usuario autenticado
        $comment = new Comment();
        $comment->content = $request->input('content');
        $comment->post_id = $post->id;
        $comment->user_id = Auth::id(); // Asumiendo que el usuario está autenticado
        $comment->save();

        // Redirigir a la publicación con un mensaje de éxito
        return redirect()->route('posts.show', $post->id)->with('success', 'Comentario agregado con éxito.');
    }

    /**
     * Eliminar un comentario existente.
     */
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);

        // Verificar si el usuario autenticado es el autor del comentario
        if ($comment->user_id != Auth::id()) {
            return redirect()->back()->with('error', 'No tienes permiso para eliminar este comentario.');
        }

        // Eliminar el comentario
        $comment->delete();

        return redirect()->back()->with('success', 'Comentario eliminado correctamente.');
    }
}
