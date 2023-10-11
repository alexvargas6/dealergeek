<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $table = 'eventos'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'idpaquete',
        'numero_evento',
        'unixtime',
        'descripcion_evento',
        'localizacion_evento',
        'ciudad',
        'estado',
    ];

    // Relación con el paquete
    public function paquete()
    {
        return $this->belongsTo(Paquete::class, 'idpaquete');
    }
}
