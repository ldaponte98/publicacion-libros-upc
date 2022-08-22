<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuPerfil extends Model
{
    protected $table      = 'menu_perfil';

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id', 'id');
    }
}
