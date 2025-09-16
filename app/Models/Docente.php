<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// app/Models/Docente.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    protected $fillable = [
        'nombres',
        'apellidos',
        'dni',
        'telefono',
        'direccion',
        'especialidad',
        'correo_electronico',
    ];

    

    public function asignaturas()
{
    return $this->belongsToMany(Asignatura::class, 'docente_asignaturas')
                ->withTimestamps()
                ->withPivot('id'); // ← Necesario para acceder a $pivot->id
}

}
