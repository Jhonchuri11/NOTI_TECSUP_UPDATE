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
        Schema::create('reporte', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuario_id')
                  ->constrained('users')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
                $table->foreignId('categoria_id')
                    ->constrained('categoria')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
                $table->foreignId('administrador_id')
                    ->constrained('administrador')
                    ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->string('ubicacion');
            $table->dateTime('fecha');
            $table->string('evidencia');
            $table->string('descripcion');
            $table->enum('estado', ['pendiente', 'aprobado', 'desaprobado'])->default('pendiente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reporte');
    }
};
