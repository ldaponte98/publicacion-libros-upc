<p class="mb-0 text-sm">TIPO DE OBRA.</p>
<small>Por los objetivos, la estructura, el tratamiento de los temas, las ilustraciones de apoyo. ¿En cuál de las
    siguientes categorías clasificaría la obra evaluada? Es bueno aclarar que COLCIENCIAS tipifica todos
    estos tipos de obra como de Investigación o Divulgativos.</small>
<div class="multisteps-form__content">
    <div class="row mt-3">
        @php
            $otroTipoObra = $data->calificacion->tipo_obra != null;
            $readonly = $data->readonly;
        @endphp
        <div class="col-sm-12">
            <input class="item-form-tipo-obra" id="libro_resultado_investigacion" type="checkbox" onchange="validarOpcionesTipoObra('Libro resultado de investigación', 'libro_resultado_investigacion')" @if($data->calificacion->tipo_obra == 'Libro resultado de investigación') @php $otroTipoObra = false @endphp checked @endif @if($readonly == true) disabled @endif>   
            <label for="libro_resultado_investigacion" class="custom-control-label">Libro resultado de investigación.</label>            
        </div>

        <div class="col-sm-12">
            <input class="item-form-tipo-obra" id="libro_texto" type="checkbox" onchange="validarOpcionesTipoObra('Libro de texto', 'libro_texto')" @if($data->calificacion->tipo_obra == 'Libro de texto') @php $otroTipoObra = false @endphp checked @endif @if($readonly == true) disabled @endif>   
            <label for="libro_texto" class="custom-control-label">Libro de texto.</label>            
        </div>

        <div class="col-sm-12">
            <input class="item-form-tipo-obra" id="libro_pedagogico" type="checkbox" onchange="validarOpcionesTipoObra('Libro de apoyo pedagógico', 'libro_pedagogico')" @if($data->calificacion->tipo_obra == 'Libro de apoyo pedagógico') @php $otroTipoObra = false @endphp checked @endif @if($readonly == true) disabled @endif>   
            <label for="libro_pedagogico" class="custom-control-label">Libro de apoyo pedagógico.</label>            
        </div>

        <div class="col-sm-12">
            <input class="item-form-tipo-obra" id="libro_ensayo" type="checkbox" onchange="validarOpcionesTipoObra('Ensayo', 'libro_ensayo')" @if($data->calificacion->tipo_obra == 'Ensayo') @php $otroTipoObra = false @endphp checked @endif @if($readonly == true) disabled @endif>   
            <label for="libro_ensayo" class="custom-control-label">Ensayo.</label>            
        </div>

        <div class="col-sm-12">
            <input class="item-form-tipo-obra" id="libro_resumen" type="checkbox" onchange="validarOpcionesTipoObra('Resumen', 'libro_resumen')" @if($data->calificacion->tipo_obra == 'Resumen') @php $otroTipoObra = false @endphp checked @endif @if($readonly == true) disabled @endif>    
            <label for="libro_resumen" class="custom-control-label">Resumen.</label>            
        </div>

        <div class="col-sm-12">
            <input class="item-form-tipo-obra" id="libro_estado_arte" type="checkbox" onchange="validarOpcionesTipoObra('Estados del arte', 'libro_estado_arte')" @if($data->calificacion->tipo_obra == 'Estados del arte') @php $otroTipoObra = false @endphp checked @endif @if($readonly == true) disabled @endif>   
            <label for="libro_estado_arte" class="custom-control-label">Estados del arte.</label>            
        </div>

        <div class="col-sm-12">
            <input class="item-form-tipo-obra" id="libro_memorias" type="checkbox" onchange="validarOpcionesTipoObra('Cartilla, guía o manual', 'libro_memorias')" @if($data->calificacion->tipo_obra == 'Memorias de eventos') @php $otroTipoObra = false @endphp checked @endif @if($readonly == true) disabled @endif>   
            <label for="libro_memorias" class="custom-control-label">Memorias de eventos.</label>            
        </div>

        <div class="col-sm-12">
            <input class="item-form-tipo-obra" id="libro_manual" type="checkbox" onchange="validarOpcionesTipoObra('Manual', 'libro_manual')" @if($data->calificacion->tipo_obra == 'Manual') @php $otroTipoObra = false @endphp checked @endif @if($readonly == true) disabled @endif>   
            <label for="libro_manual" class="custom-control-label">Manual.</label>            
        </div>

        <div class="col-sm-12">
            <input class="item-form-tipo-obra" id="libro_cartilla" type="checkbox" onchange="validarOpcionesTipoObra('Cartilla', 'libro_cartilla')" @if($data->calificacion->tipo_obra == 'Cartilla') @php $otroTipoObra = false @endphp checked @endif @if($readonly == true) disabled @endif>   
            <label for="libro_cartilla" class="custom-control-label">Cartilla.</label>            
        </div>

        <div class="col-sm-12">
            <input class="item-form-tipo-obra" id="libro_poesia" type="checkbox" onchange="validarOpcionesTipoObra('Libro de poesía', 'libro_poesia')" @if($data->calificacion->tipo_obra == 'Libro de poesía') @php $otroTipoObra = false @endphp checked @endif @if($readonly == true) disabled @endif>   
            <label for="libro_poesia" class="custom-control-label">Libro de poesía.</label>            
        </div>

        <div class="col-sm-12">
            <input class="item-form-tipo-obra" id="libro_novela" type="checkbox" onchange="validarOpcionesTipoObra('Novela', 'libro_novela')" @if($data->calificacion->tipo_obra == 'Novela') @php $otroTipoObra = false @endphp checked @endif @if($readonly == true) disabled @endif>   
            <label for="libro_novela" class="custom-control-label">Novela.</label>            
        </div>

        <div class="col-sm-12">
            <input class="item-form-tipo-obra" id="libro_otro" type="checkbox" onchange="validarOpcionesTipoObra(null, 'libro_otro')" @if($otroTipoObra) checked @endif @if($readonly == true) disabled @endif>   
            <label for="libro_otro" class="custom-control-label">Otro.</label>            
        </div>

        <div class="col-sm-12 {{ !$otroTipoObra ? 'oculto' : '' }}" id="div-otro-tipo-obra">
            <input class="form-control" type="text" name="tipo_obra" id="tipo_obra" value="{{ $data->calificacion->tipo_obra }}" @if($readonly == true) disabled @endif>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-12 col-sm-6">
            <label>¿El texto responde plenamente a la categoría señalada?, o para tal efecto, ¿el texto requiere de algunos ajustes?</label>
            <input name="texto_responde_categoria" id="texto_responde_categoria" class="form-control" type="text"
                    onfocus="focused(this)" onfocusout="defocused(this)" value="{{ $data->calificacion->texto_responde_categoria }}" @if($data->readonly == true) disabled @endif>
        </div>
    </div>
    <br>
    <section id="div-libro-resultado-investigacion" class="oculto">
        <small>Si el producto es resultado de investigación, por favor, conceptúe explícitamente sobre los siguientes aspectos:</small>

        <div class="row mt-3">
            <div class="col-12 col-sm-6">
                <label>TEMPORALIDAD: ¿El producto es resultado de un proceso cabal de investigación, significa que evidencia
                    una estructura metodológica (problema, metodología y resultados) y su planteamiento ha sido realimentado
                    por los mecanismos de divulgación científica y contrastación con otras investigaciones en el área?</label>
                <input name="temporalidad" id="temporalidad" class="form-control" type="text"
                        onfocus="focused(this)" onfocusout="defocused(this)" value="{{ $data->calificacion->temporalidad }}" @if($data->readonly == true) disabled @endif>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12 col-sm-6">
                <label>NORMALIDAD DE CONTENIDO ¿El contenido del producto se estructura y se escribe en forma adecuada
                    para ser entendido y discutido por la comunidad de investigadores en el tema?</label>
                <input name="normatividad" id="normatividad" class="form-control" type="text"
                        onfocus="focused(this)" onfocusout="defocused(this)" value="{{ $data->calificacion->normatividad }}" @if($data->readonly == true) disabled @endif>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12 col-sm-6">
                <label>SELECTIVIDAD: ¿Este producto se puede considerar un aporte válido y significativo al conocimiento del área en
                    cuestión?</label>
                <input name="selectividad" id="selectividad" class="form-control" type="text"
                        onfocus="focused(this)" onfocusout="defocused(this)" value="{{ $data->calificacion->selectividad }}" @if($data->readonly == true) disabled @endif>
            </div>
        </div>
    </section>

</div>

<script>
    function validarOpcionesTipoObra(tipo, id) {
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
    }

    function validacionesFormularioResultadoInvestigacion() {
        if($("#temporalidad").val() == "") agregarErrorFormulario("Tipo de obra", "El apartado de TEMPORALIDAD es un campo obligatorio")
        if($("#normatividad").val() == "") agregarErrorFormulario("Tipo de obra", "El apartado de NORMATIVIDAD es un campo obligatorio")
        if($("#selectividad").val() == "" ) agregarErrorFormulario("Tipo de obra", "El apartado de SELECTIVIDAD es un campo obligatorio")
    }

    function validacionesTab3() {
        if($("#tipo_obra").val().trim() == "") agregarErrorFormulario("Tipo de obra", "El tipo de obra es un campo obligatorio")
        if ($("#libro_resultado_investigacion").prop('checked')) validacionesFormularioResultadoInvestigacion()
    }
</script>