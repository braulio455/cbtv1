<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    protected $fillable = [
        'dni',
        'apellido_paterno',
        'apellido_materno',
        'nombres',
        'ciclo',
        'programa',
        'fecha',
        'estado'
    ];

    protected $casts = [
        'fecha' => 'date'
    ];

    const ESTADOS = [
        'P' => 'Presente',
        'A' => 'Ausente',
        'T' => 'Tardanza'
    ];

    public function getEstadoTextoAttribute()
    {
        return self::ESTADOS[$this->estado] ?? 'Desconocido';
    }
}
