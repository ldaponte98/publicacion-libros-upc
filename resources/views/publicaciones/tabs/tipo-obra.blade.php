<p class="mb-0 text-sm">TIPO DE OBRA A PUBLICAR.</p>
<div class="multisteps-form__content">
    <div class="row mt-3">
        @php
            $otroTipoObra = $data->publicacion->tipo_obra != null;
            $readonly = $data->readonly;
        @endphp
        <div class="col-sm-12">
            <input class="item-form-tipo-obra" id="libro_resultado_investigacion" type="checkbox" onchange="validarFormulariosExtras('Libro resultado de investigación', 'libro_resultado_investigacion')" @if($data->publicacion->tipo_obra == 'Libro resultado de investigación') @php $otroTipoObra = false @endphp checked @endif @if($readonly == true) disabled @endif>   
            <label for="libro_resultado_investigacion" class="custom-control-label">Libro resultado de investigación.</label>            
        </div>

        <div class="col-sm-12">
            <input class="item-form-tipo-obra" id="libro_texto_pedagogico" type="checkbox" onchange="validarFormulariosExtras('Libro de texto o material pedagógico', 'libro_texto_pedagogico')" @if($data->publicacion->tipo_obra == 'Libro de texto o material pedagógico') @php $otroTipoObra = false @endphp checked @endif @if($readonly == true) disabled @endif>   
            <label for="libro_texto_pedagogico" class="custom-control-label">Libro de texto o material pedagógico.</label>            
        </div>

        <div class="col-sm-12">
            <input class="item-form-tipo-obra" id="libro_recopilacion" type="checkbox" onchange="validarFormulariosExtras('Libro de recopilación de capítulos', 'libro_recopilacion')" @if($data->publicacion->tipo_obra == 'Libro de recopilación de capítulos') @php $otroTipoObra = false @endphp checked @endif @if($readonly == true) disabled @endif>   
            <label for="libro_recopilacion" class="custom-control-label">Libro de recopilación de capítulos.</label>            
        </div>

        <div class="col-sm-12">
            <input class="item-form-tipo-obra" id="libro_divulgativo" type="checkbox" onchange="validarFormulariosExtras('Libro divulgativo o institucional', 'libro_divulgativo')" @if($data->publicacion->tipo_obra == 'Libro divulgativo o institucional') @php $otroTipoObra = false @endphp checked @endif @if($readonly == true) disabled @endif>    
            <label for="libro_divulgativo" class="custom-control-label">Libro divulgativo o institucional.</label>            
        </div>

        <div class="col-sm-12">
            <input class="item-form-tipo-obra" id="libro_literatura" type="checkbox" onchange="validarFormulariosExtras('Libro de literatura', 'libro_literatura')" @if($data->publicacion->tipo_obra == 'Libro de literatura') @php $otroTipoObra = false @endphp checked @endif @if($readonly == true) disabled @endif>   
            <label for="libro_literatura" class="custom-control-label">Libro de literatura.</label>            
        </div>

        <div class="col-sm-12">
            <input class="item-form-tipo-obra" id="libro_cartilla" type="checkbox" onchange="validarFormulariosExtras('Cartilla, guía o manual', 'libro_cartilla')" @if($data->publicacion->tipo_obra == 'Cartilla, guía o manual') @php $otroTipoObra = false @endphp checked @endif @if($readonly == true) disabled @endif>   
            <label for="libro_cartilla" class="custom-control-label">Cartilla, guía o manual.</label>            
        </div>

        <div class="col-sm-12">
            <input class="item-form-tipo-obra" id="libro_memorias" type="checkbox" onchange="validarFormulariosExtras('Libro de memorias de eventos', 'libro_memorias')" @if($data->publicacion->tipo_obra == 'Libro de memorias de eventos') @php $otroTipoObra = false @endphp checked @endif @if($readonly == true) disabled @endif>   
            <label for="libro_memorias" class="custom-control-label">Libro de memorias de eventos.</label>            
        </div>

        <div class="col-sm-12">
            <input class="item-form-tipo-obra" id="libro_otro" type="checkbox" onchange="validarFormulariosExtras(null, 'libro_otro')" @if($otroTipoObra) checked @endif @if($readonly == true) disabled @endif>   
            <label for="libro_otro" class="custom-control-label">Otro.</label>            
        </div>

        <div class="col-sm-12 {{ !$otroTipoObra ? 'oculto' : '' }}" id="div-otro-tipo-obra">
            <input class="form-control" type="text" name="tipo_obra" id="tipo_obra" value="{{ $data->publicacion->tipo_obra }}" @if($readonly == true) disabled @endif>
        </div>
    </div>

    
    <section id="div-libro-resultado-investigacion" style="display: none;">
        <hr class="horizontal dark mt-4">
        <p><b>Los libros resultados de investigación, deben suministrar adicionalmente la siguiente información:</b></p>
        <div class="row mt-3">
            <div class="col-12 col-sm-6">
                <label>Nombre del proyecto que generó como resultado el libro de investigación.</label>
                <input name="libro_resultado_investigacion_nombre_proyecto" id="libro_resultado_investigacion_nombre_proyecto" class="form-control" type="text"
                        onfocus="focused(this)" onfocusout="defocused(this)" value="{{ $data->publicacion->libro_resultado_investigacion_nombre_proyecto }}" @if($readonly == true) disabled @endif>
            </div>
            <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                <label>Fuente de financiación del proyecto.</label>
                <select  name="libro_resultado_investigacion_fuente" id="libro_resultado_investigacion_fuente" class="form-control select2" @if($readonly == true) disabled @endif>
                    <option @if($data->publicacion->libro_resultado_investigacion_fuente == "Interna") selected @endif value="Interna">Interna</option>
                    <option @if($data->publicacion->libro_resultado_investigacion_fuente == "Externa") selected @endif value="Externa">Externa</option>
                </select>
            </div>
            <div class="col-12 col-sm-6">
                <label>En caso de haber financiación externa, nombre de la entidad.</label>
                <input name="libro_resultado_investigacion_nombre_entidad" id="libro_resultado_investigacion_nombre_entidad" class="form-control" type="text"
                        onfocus="focused(this)" onfocusout="defocused(this)" value="{{ $data->publicacion->libro_resultado_investigacion_nombre_entidad }}" @if($readonly == true) disabled @endif>
            </div>
            <div class="col-12 col-sm-6">
                <label>Fecha de inicio.</label>
                <input name="libro_resultado_investigacion_fecha_inicio" id="libro_resultado_investigacion_fecha_inicio" class="form-control" type="date"
                        onfocus="focused(this)" onfocusout="defocused(this)" value="{{ $data->publicacion->libro_resultado_investigacion_fecha_inicio }}" @if($readonly == true) disabled @endif>
            </div>
            <div class="col-12 col-sm-6">
                <label>Fecha de terminación.</label>
                <input name="libro_resultado_investigacion_fecha_fin" id="libro_resultado_investigacion_fecha_fin" class="form-control" type="date"
                        onfocus="focused(this)" onfocusout="defocused(this)" value="{{ $data->publicacion->libro_resultado_investigacion_fecha_fin }}" @if($readonly == true) disabled @endif>
            </div>
            <div class="col-12 col-sm-6">
                <label>Tiempo de ejecución.</label>
                <input name="libro_resultado_investigacion_tiempo_ejecucion" id="libro_resultado_investigacion_tiempo_ejecucion" class="form-control" type="text"
                        onfocus="focused(this)" onfocusout="defocused(this)" value="{{ $data->publicacion->libro_resultado_investigacion_tiempo_ejecucion }}" @if($readonly == true) disabled @endif>
            </div>
            <div class="col-12 col-sm-6">
                <label>Grupo de investigación que ejecutó el proyecto.</label>
                <input name="libro_resultado_investigacion_grupo_investigacion" id="libro_resultado_investigacion_grupo_investigacion" class="form-control" type="text"
                        onfocus="focused(this)" onfocusout="defocused(this)" value="{{ $data->publicacion->libro_resultado_investigacion_grupo_investigacion }}" @if($readonly == true) disabled @endif>
            </div>
            <div class="col-12 col-sm-6">
                <label>Linea de investigación del proyecto.</label>
                <input name="libro_resultado_investigacion_linea_investigacion" id="libro_resultado_investigacion_linea_investigacion" class="form-control" type="text"
                        onfocus="focused(this)" onfocusout="defocused(this)" value="{{ $data->publicacion->libro_resultado_investigacion_linea_investigacion }}" @if($readonly == true) disabled @endif>
            </div>
        </div>
    </section>

    <section id="div-libro-memorias-eventos" style="display: none;">
        <hr class="horizontal dark mt-4">
        <p><b>Los libros de memorias de eventos, deben suministrar adicionalmente la siguiente información:</b></p>
        <div class="row mt-3">
            <div class="col-12 col-sm-6">
                <label>Nombre o título del evento.</label>
                <input name="libro_memorias_eventos_nombre_evento" id="libro_memorias_eventos_nombre_evento" class="form-control" type="text"
                        onfocus="focused(this)" onfocusout="defocused(this)" value="{{ $data->publicacion->libro_memorias_eventos_nombre_evento }}" @if($readonly == true) disabled @endif>
            </div>
            <div class="col-12 col-sm-6">
                <label>Fecha de inicio.</label>
                <input name="libro_memorias_eventos_fecha_inicio" id="libro_memorias_eventos_fecha_inicio" class="form-control item-form-libro-memorias-eventos" type="date"
                        onfocus="focused(this)" onfocusout="defocused(this)" value="{{ $data->publicacion->libro_memorias_eventos_fecha_inicio }}" @if($readonly == true) disabled @endif>
            </div>
            <div class="col-12 col-sm-6">
                <label>Fecha de terminación.</label>
                <input name="libro_memorias_eventos_fecha_fin" id="libro_memorias_eventos_fecha_fin" class="form-control item-form-libro-memorias-eventos" type="date"
                        onfocus="focused(this)" onfocusout="defocused(this)" value="{{ $data->publicacion->libro_memorias_eventos_fecha_fin }}" @if($readonly == true) disabled @endif>
            </div>
            <div class="col-12 col-sm-6">
                <label>Nombre de los organizadores.</label>
                <input name="libro_memorias_eventos_nombre_organizadores" id="libro_memorias_eventos_nombre_organizadores" class="form-control item-form-libro-memorias-eventos" type="text"
                        onfocus="focused(this)" onfocusout="defocused(this)" value="{{ $data->publicacion->libro_memorias_eventos_nombre_organizadores }}" @if($readonly == true) disabled @endif>
            </div>
            <div class="col-12 col-sm-6">
                <label>Grupo de investigación que ejecutó el proyecto.</label>
                <input name="libro_memorias_eventos_grupo_investigacion" id="libro_memorias_eventos_grupo_investigacion" class="form-control item-form-libro-memorias-eventos" type="text"
                        onfocus="focused(this)" onfocusout="defocused(this)" value="{{ $data->publicacion->libro_memorias_eventos_grupo_investigacion }}" @if($readonly == true) disabled @endif>
            </div>
            <div class="col-12 col-sm-6">
                <label>Nombre del grupo de investigación organizador.</label>
                <input name="libro_memorias_eventos_grupo_investigacion_organizador" id="libro_memorias_eventos_grupo_investigacion_organizador" class="form-control item-form-libro-memorias-eventos" type="text"
                        onfocus="focused(this)" onfocusout="defocused(this)" value="{{ $data->publicacion->libro_memorias_eventos_grupo_investigacion_organizador }}" @if($readonly == true) disabled @endif>
            </div>
        </div>
    </section>
</div>

<script>
    function validarFormulariosExtras(tipo, id) {
        $(".item-form-tipo-obra").prop('checked', false)
        $("#tipo_obra").val(tipo)
        $(`#${id}`).prop('checked', true)

        if(tipo == null) { $("#div-otro-tipo-obra").fadeIn() }else{ $("#div-otro-tipo-obra").fadeOut() }
        validarFormulariosSegunOpcion()
    }

    function validarFormulariosSegunOpcion() {
        if ($("#libro_resultado_investigacion").prop('checked')) {
            $("#div-libro-resultado-investigacion").fadeIn()
        }else{
            $("#div-libro-resultado-investigacion").fadeOut()
        }

        if ($("#libro_memorias").prop('checked')) {
            $("#div-libro-memorias-eventos").fadeIn()
        }else{
            $("#div-libro-memorias-eventos").fadeOut()
        }
    }

    function validacionesTab2() {
        if($("#tipo_obra").val().trim() == "") agregarErrorFormulario("Tipo de obra a publicar", "El tipo de obra es un campo obligatorio")
        if ($("#libro_resultado_investigacion").prop('checked')) validacionesFormularioResultadoInvestigacion()
        if ($("#libro_memorias").prop('checked')) validacionesFormularioMemoriasEventos()
    }

    function validacionesFormularioResultadoInvestigacion() {
        if($("#libro_resultado_investigacion_nombre_proyecto").val() == "") agregarErrorFormulario("Tipo de obra a publicar", "El nombre del proyecto es un campo obligatorio")
        if($("#libro_resultado_investigacion_fuente").val() == "") agregarErrorFormulario("Tipo de obra a publicar", "La fuente de financiación es un campo obligatorio")
        if($("#libro_resultado_investigacion_nombre_entidad").val() == "" && $("#libro_resultado_investigacion_fuente").val() == "Externa") agregarErrorFormulario("Tipo de obra a publicar", "El nombre de la entidad es un campo obligatorio")
        if($("#libro_resultado_investigacion_fecha_inicio").val() == "") agregarErrorFormulario("Tipo de obra a publicar", "La fecha de inicio es un campo obligatorio")
        if($("#libro_resultado_investigacion_fecha_fin").val() == "") agregarErrorFormulario("Tipo de obra a publicar", "La fecha de terminación es un campo obligatorio")
        if($("#libro_resultado_investigacion_tiempo_ejecucion").val() == "") agregarErrorFormulario("Tipo de obra a publicar", "El tiempo de ejecución es un campo obligatorio")
        if($("#libro_resultado_investigacion_grupo_investigacion").val() == "") agregarErrorFormulario("Tipo de obra a publicar", "El grupo de investigación que ejecutó el proyecto es un campo obligatorio")
        if($("#libro_resultado_investigacion_linea_investigacion").val() == "") agregarErrorFormulario("Tipo de obra a publicar", "La linea de investigación del proyecto es un campo obligatorio")
    }
    
    function validacionesFormularioMemoriasEventos() {
        if($("#libro_memorias_eventos_nombre_evento").val() == "") agregarErrorFormulario("Tipo de obra a publicar", "El nombre del evento es un campo obligatorio")
        if($("#libro_memorias_eventos_fecha_inicio").val() == "") agregarErrorFormulario("Tipo de obra a publicar", "La fecha de inicio del evento es un campo obligatorio")
        if($("#libro_memorias_eventos_fecha_fin").val() == "") agregarErrorFormulario("Tipo de obra a publicar", "La fecha de terminación del evento es un campo obligatorio")
        if($("#libro_memorias_eventos_nombre_organizadores").val() == "") agregarErrorFormulario("Tipo de obra a publicar", "Los nombres de los organizadores es un campo obligatorio")
        if($("#libro_memorias_eventos_grupo_investigacion").val() == "") agregarErrorFormulario("Tipo de obra a publicar", "El grupo de investigación que ejecutó el proyecto es un campo obligatorio")
        if($("#libro_memorias_eventos_grupo_investigacion_organizador").val() == "") agregarErrorFormulario("Tipo de obra a publicar", "El nombre del grupo de investigación organizador es un campo obligatorio")
    }

    @if ($data->publicacion->tipo_obra)
        validarFormulariosSegunOpcion()
    @endif
</script>