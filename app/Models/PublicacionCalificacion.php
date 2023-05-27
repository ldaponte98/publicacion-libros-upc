<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PublicacionCalificacion extends Model
{
    protected $table      = 'publicacion_calificacion';

    protected $fillable   = [ "observaciones_fecha_entrega", "observaciones_fecha_elaboracion", "observaciones_fecha_recepcion_comite", 
        "evaluador_nombres", "evaluador_fecha_nacimiento", "evaluador_nacionalidad", "evaluador_pais_nacimiento", 
        "evaluador_identificacion", "evaluador_titulo_profesional", "evaluador_institucion_expide", 
        "evaluador_nivel_formacion", "evaluador_institucion_expide_nivel_formacion", "evaluador_email", 
        "evaluador_telefono", "evaluador_direccion", "evaluador_ciudad", "evaluador_pais", 
        "evaluador_institucion_vinculada", "evaluador_cargo", "evaluador_link", "tipo_obra", "brinda_aportes", 
        "unidad_conceptual", "medida_objetivos", "solidez", "adecuacion_producto", "aporte_pertenencia", 
        "adecuado_titulo", "justificada_inclusion", "estilo_concuerda", "ortografia_redaccion", 
        "producto_fuentes_pertinentes", "evidencia_exactitud", "distinguir_aportes_autor", "uso_adecuado_procedimientos", 
        "fuentes_pertinentes", "producto_de_interes", "estado_evaluacion", "estado_evaluacion_final", 
        "recomendaciones", "observaciones", "texto_responde_categoria"
    ];
}
