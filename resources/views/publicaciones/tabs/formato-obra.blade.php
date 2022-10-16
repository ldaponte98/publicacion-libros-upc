<p class="mb-0 text-sm">FORMATO EN EL QUE SE SOLICITA SEA PUBLICADA LA OBRA.</p>
<div class="multisteps-form__content">
    <div class="row mt-3">
        
        <div class="col-sm-12">
            <input class="item-form-formato-obra" id="formato_obra_1" type="checkbox" onchange="validarOpcionFormatoObra(1, 'Impreso')">   
            <label for="formato_obra_1" class="custom-control-label">Impreso.</label>            
        </div>
        <div class="col-sm-12">
            <input class="item-form-formato-obra" id="formato_obra_2" type="checkbox" onchange="validarOpcionFormatoObra(2, 'Electrónico en CD-ROM')">   
            <label for="formato_obra_2" class="custom-control-label">Electrónico en CD-ROM.</label>            
        </div>
        <div class="col-sm-12">
            <input class="item-form-formato-obra" id="formato_obra_3" type="checkbox" onchange="validarOpcionFormatoObra(3, 'Electrónico virtual (on-line)')">   
            <label for="formato_obra_3" class="custom-control-label">Electrónico virtual (on-line).</label>            
        </div>
        <div class="col-sm-12">
            <input class="item-form-formato-obra" id="formato_obra_otro" type="checkbox" onchange="validarOpcionFormatoObra(null)">   
            <label for="formato_obra_otro" class="custom-control-label">Otro.</label>            
        </div>
        <div class="col-sm-12" id="div-otro-formato" style="display: none;">
            <input id="formato_obra" name="formato_obra" placeholder="" class="form-control" type="text"
                onfocus="focused(this)" onfocusout="defocused(this)" required>          
        </div>
    </div>
</div>

<script>
    function validarOpcionFormatoObra(tipo, valor = null) {
        $(".item-form-formato-obra").prop('checked', false)
        if(tipo == null){
            $("#formato_obra").val("")
            $("#div-otro-formato").fadeIn()
            $("#formato_obra_otro").prop('checked', true)
        }else{
            $("#formato_obra").val(valor)
            $(`#formato_obra_${tipo}`).prop('checked', true)
            $("#formato_obra_otro").prop('checked', false)
            $("#div-otro-formato").fadeOut()
        }
    }
</script>