<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('preinscripciones', function (Blueprint $table) {
            $table->id();
            $table->string('apellido_paterno', 255);
            $table->string('apellido_materno', 255);
            $table->string('nombres', 255);
            $table->string('dni', 20);
            $table->date('fecha_nacimiento');
            $table->enum('sexo', ['masculino', 'femenino']);
            $table->string('foto_perfil', 255)->nullable();
            $table->string('watsap_propio', 20);
            $table->string('watsap_apoderado', 20);
            $table->string('parentesco', 50);
            $table->string('programa_estudios', 255);
            $table->string('colegio_procedencia', 255);
            $table->enum('ciclo', ['intensivo', 'ordinario_I', 'ordinario_II']);
            $table->string('departamento', 100);
            $table->string('provincia', 100);
            $table->string('distrito', 100);
            $table->string('numero_recibo', 100);
            $table->date('fecha_pago');
            $table->decimal('monto_pagado', 10, 2);
            $table->enum('estado_pago', ['pago_completado', 'pago_pendiente']);
            $table->enum('como_se_entero', ['amigos_familiares', 'redes_sociales', 'radio_tv', 'volantes', 'ferias', 'otro']);
            $table->enum('estado', ['pendiente', 'aprobado', 'rechazado'])->default('pendiente');
            $table->timestamps();

            $table->unique(['dni', 'ciclo']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('preinscripciones');
    }
};
