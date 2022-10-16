<p class="mb-0 text-sm">TIPO DE OBRA A PUBLICAR.</p>
<div class="multisteps-form__content">
    <div class="row mt-3">
        <div class="col-sm-12">
            <input id="libro_resultado_investigacion" type="checkbox" name="libro_resultado_investigacion" onchange="validarFormulariosExtras()">   
            <label for="libro_resultado_investigacion" class="custom-control-label">Libro resultado de investigación.</label>            
        </div>

        <div class="col-sm-12">
            <input id="libro_texto_pedagogico" type="checkbox" name="libro_texto_pedagogico">   
            <label for="libro_texto_pedagogico" class="custom-control-label">Libro de texto o material pedagógico.</label>            
        </div>

        <div class="col-sm-12">
            <input id="libro_recopilacion" type="checkbox" name="libro_recopilacion">   
            <label for="libro_recopilacion" class="custom-control-label">Libro de recopilación de capítulos.</label>            
        </div>

        <div class="col-sm-12">
            <input id="libro_divulgativo" type="checkbox" name="libro_divulgativo">   
            <label for="libro_divulgativo" class="custom-control-label">Libro divulgativo o institucional.</label>            
        </div>

        <div class="col-sm-12">
            <input id="libro_literatura" type="checkbox" name="libro_literatura">   
            <label for="libro_literatura" class="custom-control-label">Libro de literatura.</label>            
        </div>

        <div class="col-sm-12">
            <input id="libro_cartilla" type="checkbox" name="libro_cartilla">   
            <label for="libro_cartilla" class="custom-control-label">Cartilla, guía o manual.</label>            
        </div>

        <div class="col-sm-12">
            <input id="libro_memorias" type="checkbox" name="libro_memorias" onchange="validarFormulariosExtras()">   
            <label for="libro_memorias" class="custom-control-label">Libro de memorias de eventos.</label>            
        </div>
    </div>

    
    <section id="div-libro-resultado-investigacion" style="display: none;">
        <hr class="horizontal dark mt-4">
        <p><b>Los libros resultados de investigación, deben suministrar adicionalmente la siguiente información:</b></p>
        <div class="row mt-3">
            <div class="col-12 col-sm-6">
                <label>Nombre del proyecto que generó como resultado el libro de investigación.</label>
                <input name="libro_resultado_investigacion_nombre_proyecto" class="form-control item-form-libro-resultado-investigacion" type="text"
                        onfocus="focused(this)" onfocusout="defocused(this)">
            </div>
            <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                <label>Fuente de financiación del proyecto.</label>
                <select name="libro_resultado_investigacion_fuente" class="form-control select2 item-form-libro-resultado-investigacion">
                    <option value="Interna">Interna</option>
                    <option value="Externa">Externa</option>
                </select>
            </div>
            <div class="col-12 col-sm-6">
                <label>En caso de haber financiación externa, nombre de la entidad.</label>
                <input name="libro_resultado_investigacion_nombre_entidad" class="form-control item-form-libro-resultado-investigacion" type="text"
                        onfocus="focused(this)" onfocusout="defocused(this)">
            </div>
            <div class="col-12 col-sm-6">
                <label>Fecha de inicio.</label>
                <input name="libro_resultado_investigacion_fecha_inicio" class="form-control item-form-libro-resultado-investigacion" type="date"
                        onfocus="focused(this)" onfocusout="defocused(this)">
            </div>
            <div class="col-12 col-sm-6">
                <label>Fecha de terminación.</label>
                <input name="libro_resultado_investigacion_fecha_fin" class="form-control item-form-libro-resultado-investigacion" type="date"
                        onfocus="focused(this)" onfocusout="defocused(this)">
            </div>
            <div class="col-12 col-sm-6">
                <label>Tiempo de ejecución.</label>
                <input name="libro_resultado_investigacion_tiempo_ejecucion" class="form-control item-form-libro-resultado-investigacion" type="text"
                        onfocus="focused(this)" onfocusout="defocused(this)">
            </div>
            <div class="col-12 col-sm-6">
                <label>Grupo de investigación que ejecutó el proyecto.</label>
                <input name="libro_resultado_investigacion_grupo_investigacion" class="form-control item-form-libro-resultado-investigacion" type="text"
                        onfocus="focused(this)" onfocusout="defocused(this)">
            </div>
            <div class="col-12 col-sm-6">
                <label>Linea de investigación del proyecto.</label>
                <input name="libro_resultado_investigacion_linea_investigacion" class="form-control item-form-libro-resultado-investigacion" type="text"
                        onfocus="focused(this)" onfocusout="defocused(this)">
            </div>
        </div>
    </section>

    <section id="div-libro-memorias-eventos" style="display: none;">
        <hr class="horizontal dark mt-4">
        <p><b>Los libros de memorias de eventos, deben suministrar adicionalmente la siguiente información:</b></p>
        <div class="row mt-3">
            <div class="col-12 col-sm-6">
                <label>Nombre o título del evento.</label>
                <input name="libro_memorias_eventos_nombre_evento" class="form-control item-form-libro-resultado-investigacion" type="text"
                        onfocus="focused(this)" onfocusout="defocused(this)">
            </div>
            <div class="col-12 col-sm-6">
                <label>Fecha de inicio.</label>
                <input name="libro_memorias_eventos_fecha_inicio" class="form-control item-form-libro-memorias-eventos" type="date"
                        onfocus="focused(this)" onfocusout="defocused(this)">
            </div>
            <div class="col-12 col-sm-6">
                <label>Fecha de terminación.</label>
                <input name="libro_memorias_eventos_fecha_fin" class="form-control item-form-libro-memorias-eventos" type="date"
                        onfocus="focused(this)" onfocusout="defocused(this)">
            </div>
            <div class="col-12 col-sm-6">
                <label>Nombre de los organizadores.</label>
                <input name="libro_memorias_eventos_nombre_organizadores" class="form-control item-form-libro-memorias-eventos" type="text"
                        onfocus="focused(this)" onfocusout="defocused(this)">
            </div>
            <div class="col-12 col-sm-6">
                <label>Grupo de investigación que ejecutó el proyecto.</label>
                <input name="libro_memorias_eventos_grupo_investigacion" class="form-control item-form-libro-memorias-eventos" type="text"
                        onfocus="focused(this)" onfocusout="defocused(this)">
            </div>
            <div class="col-12 col-sm-6">
                <label>Nombre del grupo de investigación organizador.</label>
                <input name="libro_memorias_eventos_grupo_investigacion_organizador" class="form-control item-form-libro-memorias-eventos" type="text"
                        onfocus="focused(this)" onfocusout="defocused(this)">
            </div>
        </div>
    </section>
</div>

<script>
    function validarFormulariosExtras() {
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
</script>