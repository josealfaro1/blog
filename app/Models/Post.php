<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Los campos que se pueden llenar mediante la creación masiva
    protected $fillable = ['title', 'content', 'category', 'tags', 'user_id'];

    // Relación: Un post tiene muchos comentarios
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
