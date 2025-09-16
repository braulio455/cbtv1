<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('asistencias', function (Blueprint $table) {
            $table->id();
            $table->string('dni');
            $table->string('apellido_paterno');
            $table->string('apellido_materno');
            $table->string('nombres');
            $table->string('ciclo');
            $table->string('programa');
            $table->date('fecha');
            $table->enum('estado', ['P', 'A', 'T'])->default('P');
            $table->timestamps();

            $table->unique(['dni', 'fecha']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('asistencias');
    }
};
