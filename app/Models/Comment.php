<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /**
     * Los campos que se pueden asignar masivamente.
     *
     * @var array
     */
    protected $fillable = [
        'content', 
        'post_id', 
        'user_id'
    ];

    /**
     * Relación: un comentario pertenece a una publicación.
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    /**
     * Relación: un comentario pertenece a un usuario.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
