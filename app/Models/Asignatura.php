<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    protected $fillable = ['grupo_id', 'nombre', 'descripcion'];

    public function grupo()
    {
        return $this->belongsTo(Grupo::class);
    }
}

