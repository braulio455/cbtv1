<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $fillable = ['nombre', 'descripcion'];

    // Relación con programas (ya existente)
    public function programas()
    {
        return $this->hasMany(Programa::class);
    }

    // Nueva relación con asignaturas
    public function asignaturas()
    {
        return $this->hasMany(Asignatura::class);
    }
}
