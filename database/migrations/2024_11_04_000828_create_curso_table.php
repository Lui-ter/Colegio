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
        Schema::create('cursos', function (Blueprint $table) {
            $table->increments('id_curso');
            $table->string('nombre');
            $table->unsignedInteger('profesor_id');
            $table->unsignedInteger('estudiante_id');
            $table->boolean('estado')->default(1);
            $table->foreign('profesor_id')->references('id_profesor')->on('profesores');
            $table->foreign('estudiante_id')->references('id_estudiante')->on('estudiantes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('curso');
    }
};
