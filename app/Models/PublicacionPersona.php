<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicacionPersona extends Model
{
    protected $table      = 'publicacion_persona';
    protected $fillable   = [
        "publicacion_id", "tipo", "nombres", "telefono",
        "email", "direccion", "departamento", "municipio",
        "actividad"
    ];
}
