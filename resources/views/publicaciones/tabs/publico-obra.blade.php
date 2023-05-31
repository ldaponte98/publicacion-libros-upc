<p class="mb-0 text-sm">PUBLICO AL QUE ESTA DIRIGIDO LA OBRA.</p>
<div class="multisteps-form__content">
    <div class="row mt-3">
        @php
            $otroTipoPublico = $data->publicacion->tipo_publico != null;
            $readonly = $data->readonly;
        @endphp
        <div class="col-sm-12">
            <input class="item-form-tipo-publico" id="tipo_publico_1" type="checkbox" onchange="validarOpcionTipoPublico(1, 'Pregrado')" @if($data->publicacion->tipo_publico == 'Pregrado') @php $otroTipoPublico = false @endphp checked @endif @if($readonly == true) disabled @endif>   
            <label for="tipo_publico_1" class="custom-control-label">Pregrado.</label>            
        </div>
        <div class="col-sm-12">
            <input class="item-form-tipo-publico" id="tipo_publico_2" type="checkbox" onchange="validarOpcionTipoPublico(2, 'Especializado')" @if($data->publicacion->tipo_publico == 'Especializado') @php $otroTipoPublico = false @endphp checked @endif @if($readonly == true) disabled @endif>   
            <label for="tipo_publico_2" class="custom-control-label">Especializado.</label>            
        </div>
        <div class="col-sm-12">
            <input class="item-form-tipo-publico" id="tipo_publico_3" type="checkbox" onchange="validarOpcionTipoPublico(3, 'Maestría o Doctorado')" @if($data->publicacion->tipo_publico == 'Maestría o Doctorado') @php $otroTipoPublico = false @endphp checked @endif @if($readonly == true) disabled @endif>   
            <label for="tipo_publico_3" class="custom-control-label">Maestría o Doctorado.</label>            
        </div>
        <div class="col-sm-12">
            <input class="item-form-tipo-publico" id="tipo_publico_4" type="checkbox" onchange="validarOpcionTipoPublico(4, 'Público general')" @if($data->publicacion->tipo_publico == 'Público general') @php $otroTipoPublico = false @endphp checked @endif @if($readonly == true) disabled @endif>   
            <label for="tipo_publico_3" class="custom-control-label">Público general.</label>            
        </div>
        <div class="col-sm-12">
            <input class="item-form-tipo-publico" id="tipo_publico_otro" type="checkbox" onchange="validarOpcionTipoPublico(null)" @if($otroTipoPublico) checked @endif @if($readonly == true) disabled @endif>   
            <label for="tipo_publico_otro" class="custom-control-label">Otro.</label>            
        </div>
        <div class="col-sm-12 {{ !$otroTipoPublico ? 'oculto' : '' }}" id="div-otro-tipo-publico">
            <input id="tipo_publico" name="tipo_publico" placeholder="" class="form-control" type="text"
                onfocus="focused(this)" onfocusout="defocused(this)" required value="{{ $data->publicacion->tipo_publico }}" @if($readonly == true) disabled @endif>          
        </div>
    </div>
</div>

<script>
    function validarOpcionTipoPublico(tipo, valor = null) {
        $(".item-form-tipo-publico").prop('checked', false)
        if(tipo == null){
            $("#tipo_publico").val("")
            $("#div-otro-tipo-publico").fadeIn()
            $("#tipo_publico_otro").prop('checked', true)
        }else{
            $("#tipo_publico").val(valor)
            $(`#tipo_publico_${tipo}`).prop('checked', true)
            $("#tipo_publico_otro").prop('checked', false)
            $("#div-otro-tipo-publico").fadeOut()
        }
    }

    function validacionesTab3() {
        if($("#tipo_publico").val().trim() == "") agregarErrorFormulario("Publico al que esta dirigido la obra", "El publico al que esta dirigido la obra es un campo obligatorio")
    }
</script>