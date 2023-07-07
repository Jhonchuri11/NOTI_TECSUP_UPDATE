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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('codigo_usuario')->unique();
            $table->timestamp('codigo_usuario_verified_at')->nullable();
            $table->string('password');
            $table->string('tipo');
            $table->unsignedBigInteger('alumno_id')->nullable();
            $table->unsignedBigInteger('profesor_id')->nullable();
            $table->unsignedBigInteger('personal_id')->nullable();
            $table->unsignedBigInteger('administrador_id')->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('alumno_id')->references('id')->on('alumno')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
                  $table->foreign('profesor_id')->references('id')->on('profesor')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->foreign('personal_id')->references('id')->on('personal')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->foreign('administrador_id')->references('id')->on('administrador')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
