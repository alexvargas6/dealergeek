<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    use HasFactory;
    protected $table = 'permisos'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'nombre_modulo',
        'nombre_ruta',
        'nombre_permiso',
        'clave_permiso',
        'estatus',
    ];
}
