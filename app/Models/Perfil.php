<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    protected $table      = 'perfil';
    protected $fillable   = [
        'nombre',
        'estado',
    ];

    public function menus()
    {
        return $this->hasMany(MenuPerfil::class, 'perfil_id', 'id');
    }


    public function getMenu()
    {
        $resultado = [];
        foreach ($this->menus as $menu_perfil) { $resultado[] = $menu_perfil->menu; }
        return $resultado;
    }

}
