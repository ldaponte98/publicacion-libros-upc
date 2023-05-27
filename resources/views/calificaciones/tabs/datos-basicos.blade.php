<p class="mb-0 text-sm">DATOS BÁSICOS DE LA EVALUACIÓN.</p>
<div class="multisteps-form__content">
    <div class="row mt-3">
        <div class="col-12 col-sm-12">
            <label>Tipología del producto</label>
            <input class="form-control" type="text"
                    onfocus="focused(this)" onfocusout="defocused(this)" value="{{ $data->publicacion->tipo_obra }}" disabled >
        </div>
        <div class="col-12 col-sm-12 mt-3 mt-sm-0">
            <label>Título de la obra</label>
            <input class="form-control" type="text"
                    onfocus="focused(this)" onfocusout="defocused(this)" value="{{ $data->publicacion->titulo_obra }}" disabled >
        </div>
        <div class="col-12 col-sm-12 mt-3 mt-sm-0">
            <label>Institución</label>
            <input class="form-control" type="text"
                    onfocus="focused(this)" onfocusout="defocused(this)" value="Universidad Popular del Cesar" disabled >
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12 col-sm-6">
            <label>Fecha de entrega del formulario al evaluador</label>
            <input class="form-control" type="text"
                    onfocus="focused(this)" onfocusout="defocused(this)" value="{{ date('d/m/Y', strtotime($data->publicacion->fecha_envio_evaluador)) }}" disabled >
        </div>
        <div class="col-12 col-sm-6">
            <label>Observaciones</label>
            <input name="observaciones_fecha_entrega" id="observaciones_fecha_entrega" class="form-control" type="text"
                    onfocus="focused(this)" onfocusout="defocused(this)" value="{{ $data->calificacion->observaciones_fecha_entrega }}" @if($data->readonly == true) disabled @endif>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-12 col-sm-6">
            <label>Fecha de elaboración de la evaluación</label>
            <input class="form-control" type="date"
                    onfocus="focused(this)" onfocusout="defocused(this)" value="{{ $data->calificacion->created_at == null ? 'No definida' : date('d/m/Y', strtotime($data->calificacion->created_at)) }}" disabled >
        </div>
        <div class="col-12 col-sm-6">
            <label>Observaciones</label>
            <input name="observaciones_fecha_elaboracion" id="observaciones_fecha_elaboracion" class="form-control" type="text"
                    onfocus="focused(this)" onfocusout="defocused(this)" value="{{ $data->calificacion->observaciones_fecha_elaboracion }}" @if($data->readonly == true) disabled @endif>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-12 col-sm-6">
            <label>Fecha de recepción de la evaluación por parte del comité editorial.</label>
            <input class="form-control" type="text"
                    onfocus="focused(this)" onfocusout="defocused(this)" value="{{ $data->calificacion->created_at == null ? 'No definida' : date('d/m/Y', strtotime($data->calificacion->created_at)) }}" disabled >
        </div>
        <div class="col-12 col-sm-6">
            <label>Observaciones</label>
            <input name="observaciones_fecha_recepcion_comite" id="observaciones_fecha_recepcion_comite" class="form-control" type="text"
                    onfocus="focused(this)" onfocusout="defocused(this)" value="{{ $data->calificacion->observaciones_fecha_recepcion_comite }}" @if($data->readonly == true) disabled @endif>
        </div>
    </div>
</div>

<script>
    function validacionesTab1() {
    }
</script>