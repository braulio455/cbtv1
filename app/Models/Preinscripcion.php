<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preinscripcion extends Model
{
    use HasFactory;

    protected $table = 'preinscripciones'; // Especifica el nombre de la tabla

    protected $fillable = [
        'apellido_paterno',
        'apellido_materno',
        'nombres',
        'dni',
        'fecha_nacimiento',
        'sexo',
        'foto_perfil',
        'watsap_propio',
        'watsap_apoderado',
        'parentesco',
        'programa_estudios',
        'colegio_procedencia',
        'ciclo',
        'departamento',
        'provincia',
        'distrito',
        'numero_recibo',
        'fecha_pago',
        'monto_pagado',
        'estado_pago',
        'como_se_entero',
        'estado'
    ];
}