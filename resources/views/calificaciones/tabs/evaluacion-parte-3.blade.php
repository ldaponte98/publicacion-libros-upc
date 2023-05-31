<p class="mb-0 text-sm">CALIFICACIÓN.</p>
@php
    $readonly = $data->readonly;
@endphp
<div class="multisteps-form__content">
    <div class="row mt-4">
        <div class="col-12 col-sm-6">
            <label>Teniendo en cuenta el contenido de la obra, ¿el producto evaluado sería de interés para qué fines y actividades:
                docentes, investigativos, divulgativos, prácticas profesionales?.</label>
                <textarea class="form-control" name="producto_de_interes" id="producto_de_interes"  @if($readonly == true) disabled @endif rows="3" value="{{ $data->calificacion->producto_de_interes }}">{{ $data->calificacion->producto_de_interes }}</textarea>
        </div>
    </div>
    <hr class="horizontal dark mt-4">
    <small><b>Evaluación final del producto: Después de su dictamen, usted considera: (por favor marque una sola opción).</b></small>
    <div class="row mt-4">
        <input type="hidden" name="estado_evaluacion" id="estado_evaluacion">
        <input type="hidden" name="estado_evaluacion_final" id="estado_evaluacion_final">
        <div class="col-sm-12">
            <input class="item-form-evaluacion-final" id="aprobado" type="checkbox" onchange="validarOpcionesEvaluacionFinal('aprobado', 'APROBADA')" @if($data->calificacion->estado_evaluacion == 'aprobado') @php $otroTipoObra = false @endphp checked @endif @if($readonly == true) disabled @endif>   
            <label for="aprobado" class="custom-control-label">Aprobar el producto como está para ser publicado</label>            
        </div>

        <div class="col-sm-12">
            <input class="item-form-evaluacion-final" id="publicable_sin_categoria" type="checkbox" onchange="validarOpcionesEvaluacionFinal('publicable_sin_categoria', 'APROBADA')" @if($data->calificacion->estado_evaluacion == 'publicable_sin_categoria') @php $otroTipoObra = false @endphp checked @endif @if($readonly == true) disabled @endif>   
            <label for="publicable_sin_categoria" class="custom-control-label">El producto es publicable pero no cumple con la categoría identificada (especificar en comentarios al autor).</label>            
        </div>

        <div class="col-sm-12">
            <input class="item-form-evaluacion-final" id="aprobado_bajo_revision" type="checkbox" onchange="validarOpcionesEvaluacionFinal('aprobado_bajo_revision', 'APROBADA')" @if($data->calificacion->estado_evaluacion == 'aprobado_bajo_revision') @php $otroTipoObra = false @endphp checked @endif @if($readonly == true) disabled @endif>   
            <label for="aprobado_bajo_revision" class="custom-control-label">Aprobar el producto para ser publicado, bajo condición de revisiones menores, sin que sea necesario re-evaluarlo (especificar)</label>            
        </div>

        <div class="col-sm-12">
            <input class="item-form-evaluacion-final" id="rechazado_nueva_revision" type="checkbox" onchange="validarOpcionesEvaluacionFinal('rechazado_nueva_revision', 'RECHAZADA POR EVALUADORES')" @if($data->calificacion->estado_evaluacion == 'rechazado_nueva_revision') @php $otroTipoObra = false @endphp checked @endif @if($readonly == true) disabled @endif>   
            <label for="rechazado_nueva_revision" class="custom-control-label">El producto debe ser revisado y sometido a nueva evaluación (especificar en comentarios al autor)</label>            
        </div>

        <div class="col-sm-12">
            <input class="item-form-evaluacion-final" id="rechazado" type="checkbox" onchange="validarOpcionesEvaluacionFinal('rechazado', 'RECHAZADA POR EVALUADORES')" @if($data->calificacion->estado_evaluacion == 'rechazado') @php $otroTipoObra = false @endphp checked @endif @if($readonly == true) disabled @endif>    
            <label for="rechazado" class="custom-control-label">No es publicable, se rechaza el producto</label>            
        </div>
    </div>

    <hr class="horizontal dark mt-4">
    <small><b>Comentarios para el</b></small>

    <div class="row mt-4">
        <div class="col-12 col-sm-6">
            <label>¿Cuáles son las recomendaciones para mejorar la calidad del producto?</label>
                <textarea class="form-control" name="recomendaciones" id="recomendaciones" rows="3" value="{{ $data->calificacion->recomendaciones }}"  @if($readonly == true) disabled @endif>{{ $data->calificacion->producto_de_interes }}</textarea>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12 col-sm-6">
            <label>Observaciones generales</label>
                <textarea class="form-control" name="observaciones" id="observaciones" rows="3" value="{{ $data->calificacion->observaciones }}"  @if($readonly == true) disabled @endif>{{ $data->calificacion->producto_de_interes }}</textarea>
        </div>
    </div>  
    <hr class="horizontal dark mt-4">
    <div class="row mt-3">
        <div class="col-12 col-sm-6">
            <label>Firma digital </label>
            @if($data->calificacion->archivo_firma != null)
            <br>
                <a href="{{ config('global.url_base') }}/archivos/firmas-digitales/{{ $data->calificacion->archivo_firma }}" target="_blank" rel="">{{ $data->calificacion->archivo_firma }}</a>
            @endif
            @if($data->readonly == false)
                <input name="archivo_firma" id="archivo_firma" class="form-control" type="file" accept=".png, .jpg, .jpeg" required>
            @endif
        </div>
    </div>
</div>

<script> 
    function validacionesTab6() {
        if($("#estado_evaluacion").val().trim() == "") agregarErrorFormulario("Calificación", "El dictamen es un campo obligatorio")
        if($("#producto_de_interes").val().trim() == "") agregarErrorFormulario("Calificación", "El comentamrio del producto evaluado sería de interés es un campo obligatorio")
        @if($data->calificacion->archivo_firma == null) 
            if($("#archivo_firma").val() == "") agregarErrorFormulario("Calificación", "El archivo de la firma digital es obligatorio")
        @endif
    }

    function validarOpcionesEvaluacionFinal(id, estado_final) {
        $(".item-form-evaluacion-final").prop('checked', false)
        $(`#${id}`).prop('checked', true)
        $("#estado_evaluacion").val(id)
        $("#estado_evaluacion_final").val(estado_final)
    }
</script>