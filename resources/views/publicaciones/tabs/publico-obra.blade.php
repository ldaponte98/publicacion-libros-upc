<p class="mb-0 text-sm">PUBLICO AL QUE ESTA DIRIGIDO LA OBRA.</p>
<div class="multisteps-form__content">
    <div class="row mt-3">
        
        <div class="col-sm-12">
            <input class="item-form-tipo-publico" id="tipo_publico_1" type="checkbox" onchange="validarOpcionTipoPublico(1, 'Pregrado')">   
            <label for="tipo_publico_1" class="custom-control-label">Pregrado.</label>            
        </div>
        <div class="col-sm-12">
            <input class="item-form-tipo-publico" id="tipo_publico_2" type="checkbox" onchange="validarOpcionTipoPublico(2, 'Especializado')">   
            <label for="tipo_publico_2" class="custom-control-label">Especializado.</label>            
        </div>
        <div class="col-sm-12">
            <input class="item-form-tipo-publico" id="tipo_publico_3" type="checkbox" onchange="validarOpcionTipoPublico(3, 'Maestría o Doctorado')">   
            <label for="tipo_publico_3" class="custom-control-label">Maestría o Doctorado.</label>            
        </div>
        <div class="col-sm-12">
            <input class="item-form-tipo-publico" id="tipo_publico_4" type="checkbox" onchange="validarOpcionTipoPublico(4, 'Público general')">   
            <label for="tipo_publico_3" class="custom-control-label">Público general.</label>            
        </div>
        <div class="col-sm-12">
            <input class="item-form-tipo-publico" id="tipo_publico_otro" type="checkbox" onchange="validarOpcionTipoPublico(null)">   
            <label for="tipo_publico_otro" class="custom-control-label">Otro.</label>            
        </div>
        <div class="col-sm-12" id="div-otro-tipo" style="display: none;">
            <input id="tipo_publico" name="tipo_publico" placeholder="" class="form-control" type="text"
                onfocus="focused(this)" onfocusout="defocused(this)" required>          
        </div>
    </div>
</div>

<script>
    function validarOpcionTipoPublico(tipo, valor = null) {
        $(".item-form-tipo-publico").prop('checked', false)
        if(tipo == null){
            $("#tipo_publico").val("")
            $("#div-otro-tipo").fadeIn()
            $("#tipo_publico_otro").prop('checked', true)
        }else{
            $("#tipo_publico").val(valor)
            $(`#tipo_publico_${tipo}`).prop('checked', true)
            $("#tipo_publico_otro").prop('checked', false)
            $("#div-otro-tipo").fadeOut()
        }
    }
</script>