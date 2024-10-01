<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text('content'); // Campo para el contenido del comentario
            $table->foreignId('post_id')->constrained()->onDelete('cascade'); // Relación con la tabla de publicaciones
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relación con la tabla de usuarios
            $table->timestamps(); // Campos para las marcas de tiempo (creado y actualizado)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};

