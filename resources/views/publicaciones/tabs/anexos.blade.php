<p class="mb-0 text-sm">ANEXOS.</p>
<div class="multisteps-form__content">
    <div class="row mt-3">
        <p>Obligatoriamente se debe presentar la obra en medio digital, en formato PDF y WORD.</p>
    </div>
    <div class="row mt-3">
        <div class="col-12 col-sm-6">
            <label>Obra formato PDF </label>
            @if($data->publicacion->archivo_pdf != null)
                <a href="{{ config('global.url_base') }}/archivos/pdf/{{ $data->publicacion->archivo_pdf }}" target="_blank" rel="">{{ $data->publicacion->archivo_pdf }}</a>
            @endif

            @if($data->readonly == false)
                <input name="archivo_obra_pdf" id="archivo_obra_pdf" class="form-control" type="file" accept="application/pdf" required>
            @endif
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-12 col-sm-6">
            <label>Obra formato WORD </label>
            @if($data->publicacion->archivo_word != null)
                <a href="{{ config('global.url_base') }}/archivos/word/{{ $data->publicacion->archivo_word }}" target="_blank" rel="">{{ $data->publicacion->archivo_word }}</a>
            @endif
            @if($data->readonly == false)
                <input name="archivo_obra_word" id="archivo_obra_word" class="form-control" type="file" accept="application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/msword" required>
            @endif
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-12 col-sm-6">
            <label>Firma digital </label>
            @if($data->publicacion->archivo_firma != null)
                <a href="{{ config('global.url_base') }}/archivos/firmas-digitales/{{ $data->publicacion->archivo_firma }}" target="_blank" rel="">{{ $data->publicacion->archivo_firma }}</a>
            @endif
            @if($data->readonly == false)
                <input name="archivo_firma" id="archivo_firma" class="form-control" type="file" accept=".png, .jpg, .jpeg" required>
            @endif
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-12 col-sm-6">
            <label>Observaciones y/o aclaraciones</label>
            <textarea name="observaciones" id="observaciones" value="{{ $data->publicacion->observaciones }}" class="form-control" rows="5" @if($data->readonly == true) disabled @endif>{{ $data->publicacion->observaciones }}</textarea>
        </div>
    </div>
</div>

<script> 
    function validacionesTab7() {
        @if($data->publicacion->archivo_pdf == null) 
            if($("#archivo_obra_pdf").val() == "") agregarErrorFormulario("Anexos", "El archivo en formato PDF es obligatorio")
        @endif
        @if($data->publicacion->archivo_word == null) 
         if($("#archivo_obra_word").val() == "") agregarErrorFormulario("Anexos", "El archivo en formato WORD es obligatorio")
        @endif
        @if($data->publicacion->archivo_firma == null) 
            if($("#archivo_firma").val() == "") agregarErrorFormulario("Anexos", "El archivo de la firma digital es obligatorio")
        @endif
    }
</script>