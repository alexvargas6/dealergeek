<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermisoUsuario extends Model
{
    use HasFactory;
    protected $table = 'permiso_usuario';

    protected $fillable = ['permiso_id', 'user_id'];

    // Relación con el modelo Permiso
    public function permiso()
    {
        return $this->belongsTo(Permiso::class, 'permiso_id');
    }

    // Relación con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
