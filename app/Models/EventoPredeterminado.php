<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventoPredeterminado extends Model
{
    use HasFactory;

    protected $table = 'eventos_predeterminados';

    protected $fillable = ['nombre_evento', 'icono', 'estatus'];
}
