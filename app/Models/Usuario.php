<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table      = 'usuario';
    public $clave_confirmacion = null;
    protected $fillable = [
        'perfil_id',
        'tercero_id',
        'usuario',
        'estado',
    ];
    
    public function tercero()
    {
        return $this->belongsTo(Tercero::class, 'tercero_id');
    }

    public function perfil()
    {
        return $this->belongsTo(Perfil::class, 'perfil_id');
    }
}
