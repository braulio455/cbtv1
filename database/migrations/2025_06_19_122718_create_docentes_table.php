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
        Schema::create('docentes', function (Blueprint $table) {
    $table->id();
    $table->string('nombres');
    $table->string('apellidos');
    $table->string('dni', 8)->unique();
    $table->string('telefono', 9);
    $table->string('direccion');
    $table->string('especialidad');
    $table->string('correo_electronico')->unique(); 

    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('docentes');
    }
};
