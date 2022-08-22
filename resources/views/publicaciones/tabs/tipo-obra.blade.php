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
            <input id="libro_memorias" type="checkbox" name="libro_memorias">   
            <label for="libro_memorias" class="custom-control-label">Libro de memorias de eventos.</label>            
        </div>
    </div>
    <section id="div-libro-resultado-investigacion" style="display: none;">
        <hr class="horizontal dark mt-0">
        <p><b>Los libros resultados de investigación, deben suministrar adicionalmente la siguiente información:</b></p>
        <div class="row mt-3">
            <div class="col-12 col-sm-6">
                <label>Nombre del proyecto que generó como resultado el libro de investigación.</label>
                <input name="libro_resultado_investigacion_nombre_proyecto" class="form-control" type="text"
                        onfocus="focused(this)" onfocusout="defocused(this)">
            </div>
            <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                <label>Área del conocimiento de la obra</label>
                <select name="libro_resultado_investigacion_fuente" class="form-control select2">
                    <option value="Interna">Interna</option>
                    <option value="Externa">Externa</option>
                </select>
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
    }
</script>