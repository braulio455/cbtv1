<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{

    
    use HasFactory;

    protected $table = 'inscripciones';

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
        'como_se_entero'
    ];

    protected $casts = [
        'fecha_nacimiento' => 'date',
        'fecha_pago' => 'date',
        'monto_pagado' => 'decimal:2',
    ];

    // Relación con las asistencias
    public function asistencias()
    {
        return $this->hasMany(Asistencia::class);
    }

    public function programa()
    {
        return $this->belongsTo(Programa::class, 'programa_estudios');
    }

    public function getFullNameAttribute()
    {
        return "{$this->apellido_paterno} {$this->apellido_materno} {$this->nombres}";
    }

    public function setDniAttribute($value)
    {
        $this->attributes['dni'] = strtoupper(trim($value));
    }

    public function setWatsapPropioAttribute($value)
    {
        $this->attributes['watsap_propio'] = strtoupper(trim($value));
    }

    public function setWatsapApoderadoAttribute($value)
    {
        $this->attributes['watsap_apoderado'] = strtoupper(trim($value));
    }

    public function setSexoAttribute($value)
    {
        $this->attributes['sexo'] = strtolower(trim($value));
    }

    public function setComoSeEnteroAttribute($value)
    {
        $this->attributes['como_se_entero'] = strtolower(trim($value));
    }
}