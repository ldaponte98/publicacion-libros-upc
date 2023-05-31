<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dominio extends Model
{
    protected $table      = 'dominio';
    protected $fillable = [
        'codigo',
        'nombre',
        'padre_id',
        'estado',
    ];
}
