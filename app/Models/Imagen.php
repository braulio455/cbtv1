<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    use HasFactory;

    // ✅ Arregla el nombre de la tabla
    protected $table = 'imagenes';

    // ✅ Campos que se pueden insertar
    protected $fillable = ['nombre_original', 'ruta'];
}
