<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tercero extends Model
{
    protected $table      = 'tercero';

    protected $fillable = [
        'nombres',
        'apellidos',
        'email',
        'estado',
    ];

    public function nombreCompleto()
    {
        return $this->nombres . " " . $this->apellidos;
    }
}
