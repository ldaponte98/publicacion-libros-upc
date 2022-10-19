<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    protected $table      = 'publicacion';
    protected $fillable   = [
        "titulo_obra", "id_dominio_area_conocimiento", "id_dominio_subarea_conocimiento", 
        "programa_academico", "formacion_academica", "telefono", 
        "email", "direccion", "departamento", "municipio", 
        "tipo_obra", "libro_resultado_investigacion_nombre_proyecto", 
        "libro_resultado_investigacion_fuente", "libro_resultado_investigacion_nombre_entidad", 
        "libro_resultado_investigacion_fecha_inicio", "libro_resultado_investigacion_fecha_fin", 
        "libro_resultado_investigacion_tiempo_ejecucion", "libro_resultado_investigacion_grupo_investigacion", 
        "libro_resultado_investigacion_linea_investigacion", "libro_memorias_eventos_nombre_evento", 
        "libro_memorias_eventos_fecha_inicio", "libro_memorias_eventos_fecha_fin", 
        "libro_memorias_eventos_nombre_organizadores", "libro_memorias_eventos_grupo_investigacion_organizador", 
        "tipo_publico", "formato_obra", "num_paginas", "num_graficos", "num_fotos_blanco_negro", 
        "num_fotos_color", "num_tablas_cuadros", "obra_publicada_unicesar", "obra_publicada_otra_editorial",
        "obra_publicada_unicesar_solicitud_nueva_edicion", "obra_publicada_unicesar_nueva_edicion_editorial_unicesar", 
        "obra_publicada_unicesar_formato_diferente", "archivo_pdf", "archivo_word", "archivo_firma", "observaciones"
    ];

    public function personas()
    {
        return $this->hasMany(PublicacionPersona::class, 'publicacion_id', 'id');
    }

    public function tercero()
    {
        return $this->belongsTo(Tercero::class, 'tercero_id', 'id');
    }
}
