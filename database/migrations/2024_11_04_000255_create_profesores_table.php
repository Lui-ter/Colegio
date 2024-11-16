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
        Schema::create('profesores', function (Blueprint $table) {
            $table->increments('id_profesor');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('correo');
            $table->date('fecha_nacimiento');
            $table->integer('telefono')->unique();
            $table->string('tipo_documento');
            $table->integer('num_documento');
            $table->boolean('estado')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profesores');
    }
};
