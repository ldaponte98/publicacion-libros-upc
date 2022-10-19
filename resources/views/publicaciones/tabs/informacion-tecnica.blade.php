<p class="mb-0 text-sm">INFORMACION TECNICA DE LA OBRA.</p>
<div class="multisteps-form__content">
    <div class="row mt-4">
        <div class="col-8 col-sm-5">
            <label>Número de páginas del contenido del documento.</label>
        </div>
        <div class="col-4 col-sm-2">
            <input name="num_paginas" id="num_paginas" value="{{ $data->publicacion->num_paginas }}" class="form-control" type="number" required @if($data->readonly == true) disabled @endif>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-8 col-sm-5">
            <label>Numero gráficos.</label>
        </div>
        <div class="col-4 col-sm-2">
            <input name="num_graficos" id="num_graficos" value="{{ $data->publicacion->num_graficos }}" class="form-control" type="number" required @if($data->readonly == true) disabled @endif>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-8 col-sm-5">
            <label>Numero de fotos a blanco y negro.</label>
        </div>
        <div class="col-4 col-sm-2">
            <input name="num_fotos_blanco_negro" id="num_fotos_blanco_negro" value="{{ $data->publicacion->num_fotos_blanco_negro }}" class="form-control" type="number" required @if($data->readonly == true) disabled @endif>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-8 col-sm-5">
            <label>Numero de fotos a color.</label>
        </div>
        <div class="col-4 col-sm-2">
            <input name="num_fotos_color" id="num_fotos_color" value="{{ $data->publicacion->num_fotos_color }}" class="form-control" type="number" required @if($data->readonly == true) disabled @endif>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-8 col-sm-5">
            <label>Numero de tablas o cuadros.</label>
        </div>
        <div class="col-4 col-sm-2">
            <input name="num_tablas_cuadros" id="num_tablas_cuadros" value="{{ $data->publicacion->num_tablas_cuadros }}" class="form-control" type="number" required @if($data->readonly == true) disabled @endif>
        </div>
    </div>
</div>

<script>
    function validacionesTab5() {
        if($("#num_paginas").val() == "") agregarErrorFormulario("Información tecnica de la obra", "El número de páginas es un campo obligatorio")
        if($("#num_graficos").val() == "") agregarErrorFormulario("Información tecnica de la obra", "El número de graficos es un campo obligatorio")
        if($("#num_fotos_blanco_negro").val() == "") agregarErrorFormulario("Información tecnica de la obra", "El número de fotos a blanco y negro es un campo obligatorio")
        if($("#num_fotos_color").val() == "") agregarErrorFormulario("Información tecnica de la obra", "El número de fotos a color es un campo obligatorio")
        if($("#num_tablas_cuadros").val() == "") agregarErrorFormulario("Información tecnica de la obra", "El número de tablas o cuadros es un campo obligatorio")
    }
</script>