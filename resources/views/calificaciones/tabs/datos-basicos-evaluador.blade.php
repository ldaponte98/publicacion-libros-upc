<p class="mb-0 text-sm">DATOS BÁSICOS DEL EVALUADOR.</p>
<div class="multisteps-form__content">
    <div class="row mt-3">
        <div class="col-12 col-sm-12">
            <label>Nombres y Apellidos</label>
            <input name="evaluador_nombres" id="evaluador_nombres" class="form-control" type="text"
                    onfocus="focused(this)" onfocusout="defocused(this)" value="{{ $data->calificacion->evaluador_nombres }}" required @if($data->readonly == true) disabled @endif>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-12 col-sm-6">
            <label>Fecha de nacimiento</label>
            <input name="evaluador_fecha_nacimiento" id="evaluador_fecha_nacimiento" class="form-control" type="text"
                onfocus="focused(this)" value="{{ $data->calificacion->evaluador_fecha_nacimiento }}" onfocusout="defocused(this)" @if($data->readonly == true) disabled @endif>
        </div>
        <div class="col-12 col-sm-6">
            <label>Nacionalidad</label>
            <input name="evaluador_nacionalidad" id="evaluador_nacionalidad" class="form-control" type="text"
                    onfocus="focused(this)" onfocusout="defocused(this)" value="{{ $data->calificacion->evaluador_nacionalidad }}" required @if($data->readonly == true) disabled @endif>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-12 col-sm-6">
            <label>País de nacimiento</label>
            <input name="evaluador_pais_nacimiento" id="evaluador_pais_nacimiento" class="form-control" type="text"
                onfocus="focused(this)" value="{{ $data->calificacion->evaluador_pais_nacimiento }}" onfocusout="defocused(this)" @if($data->readonly == true) disabled @endif>
        </div>
        <div class="col-12 col-sm-6">
            <label>Documento de identidad</label>
            <input name="evaluador_identificacion" id="evaluador_identificacion" class="form-control" type="text"
                    onfocus="focused(this)" onfocusout="defocused(this)" value="{{ $data->calificacion->evaluador_identificacion }}" required @if($data->readonly == true) disabled @endif>
        </div>
    </div>

    <div class="row mt-3">
        
        <div class="col-12 col-sm-6">
            <label>Título Profesional</label>
            <input name="evaluador_titulo_profesional" id="evaluador_titulo_profesional" class="form-control" type="text"
                onfocus="focused(this)" value="{{ $data->calificacion->evaluador_titulo_profesional }}" onfocusout="defocused(this)" @if($data->readonly == true) disabled @endif>
        </div>
        <div class="col-12 col-sm-6">
            <label>Instituciónes que lo expiden (Título Profesional)</label>
            <input name="evaluador_institucion_expide" id="evaluador_institucion_expide" class="form-control" type="text"
                    onfocus="focused(this)" onfocusout="defocused(this)" value="{{ $data->calificacion->evaluador_institucion_expide }}" required @if($data->readonly == true) disabled @endif>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-12 col-sm-6">
            <input type="hidden" name="evaluador_nivel_formacion">
            <label>Nivel de formación</label>
            <select data-placeholder="Seleccione una o más..." id="select_nivel_formacion" class="form-control select2" multiple required @if($data->readonly == true) disabled @endif>
                <option @if(strpos($data->calificacion->nivel_formacion, "Especialización") !== false) selected @endif value="Especialización">Especialización</option>
                <option @if(strpos($data->calificacion->nivel_formacion, "Maestría") !== false) selected @endif value="Maestría">Maestría</option>
                <option @if(strpos($data->calificacion->nivel_formacion, "Doctorado") !== false) selected @endif value="Doctorado">Doctorado</option>
                <option @if(strpos($data->calificacion->nivel_formacion, "Posdoctorado") !== false) selected @endif value="Posdoctorado">Posdoctorado</option>
            </select>
        </div>
        <div class="col-12 col-sm-6">
            <label>Instituciónes que lo expiden (Nivel de formación)</label>
            <input name="evaluador_institucion_expide_nivel_formacion" id="evaluador_institucion_expide_nivel_formacion" class="form-control" type="text"
                    onfocus="focused(this)" onfocusout="defocused(this)" value="{{ $data->calificacion->evaluador_institucion_expide_nivel_formacion }}" required @if($data->readonly == true) disabled @endif>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-12 col-sm-6">
            <label>Correo electrónico</label>
            <input name="evaluador_email" id="evaluador_email" class="form-control" type="text"
                    onfocus="focused(this)" onfocusout="defocused(this)" value="{{ $data->calificacion->evaluador_email }}" required @if($data->readonly == true) disabled @endif>
        </div>
        <div class="col-12 col-sm-6">
            <label>Teléfono fijo y celular:</label>
            <input name="evaluador_telefono" id="evaluador_telefono" class="form-control" type="text"
                    onfocus="focused(this)" onfocusout="defocused(this)" value="{{ $data->calificacion->evaluador_telefono }}" required @if($data->readonly == true) disabled @endif>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-12 col-sm-6">
            <label>Dirección</label>
            <input name="evaluador_direccion" id="evaluador_direccion" class="form-control" type="text"
                    onfocus="focused(this)" onfocusout="defocused(this)" value="{{ $data->calificacion->evaluador_direccion }}" required @if($data->readonly == true) disabled @endif>
        </div>
        <div class="col-12 col-sm-6">
            <label>Ciudad</label>
            <input name="evaluador_ciudad" id="evaluador_ciudad" class="form-control" type="text"
                    onfocus="focused(this)" onfocusout="defocused(this)" value="{{ $data->calificacion->evaluador_ciudad }}" required @if($data->readonly == true) disabled @endif>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-12 col-sm-6">
            <label>País</label>
            <input name="evaluador_pais" id="evaluador_pais" class="form-control" type="text"
                    onfocus="focused(this)" onfocusout="defocused(this)" value="{{ $data->calificacion->evaluador_pais }}" required @if($data->readonly == true) disabled @endif>
        </div>
        <div class="col-12 col-sm-6">
            <label>Institución a la que se encuentra vinculado actualmente:</label>
            <input name="evaluador_institucion_vinculada" id="evaluador_institucion_vinculada" class="form-control" type="text"
                    onfocus="focused(this)" onfocusout="defocused(this)" value="{{ $data->calificacion->evaluador_institucion_vinculada }}" required @if($data->readonly == true) disabled @endif>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-12 col-sm-6">
            <label>Cargo</label>
            <input name="evaluador_cargo" id="evaluador_cargo" class="form-control" type="text"
                    onfocus="focused(this)" onfocusout="defocused(this)" value="{{ $data->calificacion->evaluador_cargo }}" required @if($data->readonly == true) disabled @endif>
        </div>
        <div class="col-12 col-sm-6">
            <label>Link a CvLac</label>
            <input name="evaluador_link" id="evaluador_link" class="form-control" type="text"
                    onfocus="focused(this)" onfocusout="defocused(this)" value="{{ $data->calificacion->evaluador_link }}" required @if($data->readonly == true) disabled @endif>
        </div>
    </div>
</div>

<script>
    function validacionesTab2() {
        if($("#evaluador_nombres").val() == "") agregarErrorFormulario("Datos basicos del evaluador", "El nombre y apellido es un campo obligatorio")
        if($("#evaluador_fecha_nacimiento") .val() == "") agregarErrorFormulario("Datos basicos del evaluador", "La fecha de nacimiento es un campo obligatorio")
        if($("#evaluador_nacionalidad") .val() == "") agregarErrorFormulario("Datos basicos del evaluador", "La nacionalidad es un campo obligatorio")
        if($("#evaluador_pais_nacimiento") .val() == "") agregarErrorFormulario("Datos basicos del evaluador", "El país de nacimiento es un campo obligatorio")
        if($("#evaluador_identificacion") .val() == "") agregarErrorFormulario("Datos basicos del evaluador", "El documento de identidad es un campo obligatorio")
        if($("#evaluador_titulo_profesional") .val() == "") agregarErrorFormulario("Datos basicos del evaluador", "El título profesional es un campo obligatorio")
        if($("#evaluador_institucion_expide") .val() == "") agregarErrorFormulario("Datos basicos del evaluador", "La institucion que expide el título profesional es un campo obligatorio")
        if($("#select_nivel_formacion").val().length == 0) agregarErrorFormulario("Datos basicos del evaluador", "El nivel de formación es un campo obligatorio")
        if($("#evaluador_institucion_expide_nivel_formacion") .val() == "") agregarErrorFormulario("Datos basicos del evaluador", "La institucion que expide el nivel de formación es un campo obligatorio")
        if($("#evaluador_ciudad") .val() == "") agregarErrorFormulario("Datos basicos del evaluador", "La ciudad es un campo obligatorio")
        if($("#evaluador_pais") .val() == "") agregarErrorFormulario("Datos basicos del evaluador", "El País es un campo obligatorio")
        if($("#evaluador_institucion_vinculada") .val() == "") agregarErrorFormulario("Datos basicos del evaluador", "La institución a la que se encuentra vinculado actualmente es un campo obligatorio")
        if($("#evaluador_cargo") .val() == "") agregarErrorFormulario("Datos basicos del evaluador", "El cargo es un campo obligatorio")        
        $("#evaluador_nivel_formacion").val($("#select_nivel_formacion").val().join("-"))
    }
</script>