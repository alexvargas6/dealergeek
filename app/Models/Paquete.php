<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paquete extends Model
{
    protected $table = 'paquetes'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'descripcion',
        'largo_cm',
        'ancho_cm',
        'altura_cm',
        'estatus',
        'correo_recibe',
    ];

    public function eventos()
    {
        return $this->hasMany(Evento::class, 'idpaquete');
    }
}
