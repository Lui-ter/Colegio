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
        Schema::create('acudientes', function (Blueprint $table) {
            $table->increments('id_acudiente');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('correo')->unique();
            $table->string('direccion');
            $table->bigInteger('telefono')->unique();
            $table->date('fecha_nacimiento');
            $table->string('tipo_documento');
            $table->integer('numero_documento')->unique();
            $table->unsignedInteger('estudiante_id');
            $table->boolean('estado')->default(1);
            $table->foreign('estudiante_id')->references('id_estudiante')->on('estudiantes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acudientes');
    }
};
