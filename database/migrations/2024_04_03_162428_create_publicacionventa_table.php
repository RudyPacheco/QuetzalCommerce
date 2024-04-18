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
        Schema::create('publicacion_ventas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('estado_producto');
            $table->decimal('precio');
            $table->string('categoria');
            $table->integer('cantidad');
            $table->text('descripcion');
            $table->string('user_propietario');
            $table->integer('estado_publicacion');
            $table->string('imagen');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publicacionventa');
    }
};
