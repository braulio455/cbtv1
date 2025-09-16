<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocenteAsignatura extends Model
{
    protected $table = 'docente_asignaturas'; // ← corregido (plural)

    protected $fillable = [
        'docente_id',
        'asignatura_id',
    ];

    public function docente()
    {
        return $this->belongsTo(Docente::class);
    }

    public function asignatura()
    {
        return $this->belongsTo(Asignatura::class);
    }
}
