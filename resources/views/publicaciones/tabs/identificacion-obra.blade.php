<p class="mb-0 text-sm">IDENTIFICACION DE LA OBRA, AUTORES Y COLABORADORES.</p>
<div class="multisteps-form__content">
    <div class="row mt-3">
        <div class="col-12 col-sm-6">
            <label>Título de la obra</label>
            <input name="titulo_obra" id="titulo_obra" class="form-control" type="text"
                    onfocus="focused(this)" onfocusout="defocused(this)" value="{{ $data->publicacion->titulo_obra }}" required @if($data->readonly == true) disabled @endif>
        </div>
        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
            <label>Área del conocimiento de la obra</label>
            <select name="id_dominio_area_conocimiento" id="id_dominio_area_conocimiento" class="form-control select2" required @if($data->readonly == true) disabled @endif>
                @php $items = \App\Models\Dominio::all()->where('padre_id', 1); @endphp
                @foreach ($items as $item)
                    <option @if($data->publicacion->id_dominio_area_conocimiento == $item->id)
                        selected
                    @endif value="{{ $item->id }}">{{ $item->nombre }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12 col-sm-6">
            <label>Sub área del conocimiento de la obra</label>
            <select name="id_dominio_subarea_conocimiento" id="id_dominio_subarea_conocimiento" class="form-control select2" required @if($data->readonly == true) disabled @endif>
                @php $items = \App\Models\Dominio::all()->where('padre_id', 5); @endphp
                @foreach ($items as $item)
                    <option @if($data->publicacion->id_dominio_subarea_conocimiento == $item->id)
                        selected
                    @endif value="{{ $item->id }}">{{ $item->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-12 col-sm-6">
            <label>Programa Académico y Facultad a la que está adscrito el solicitante</label>
            <select name="programa_academico" id="programa_academico" class="form-control select2" required @if($data->readonly == true) disabled @endif>
                <option @if($data->publicacion->programa_academico == "Administracion de Empresa") selected @endif value="Administracion de Empresa">Administracion de Empresa</option>
                <option @if($data->publicacion->programa_academico == "Licenciatura en Matematicas y Fisica") selected @endif value="Licenciatura en Matematicas y Fisica">Licenciatura en Matematicas y Fisica</option>
                <option @if($data->publicacion->programa_academico == "Licenciatura en Espanol e Ingles") selected @endif value="Licenciatura en Espanol e Ingles">Licenciatura en Espanol e Ingles</option>
                <option @if($data->publicacion->programa_academico == "Licenciatura en ciencias Naturales y Educacion Amb...") selected @endif value="Licenciatura en ciencias Naturales y Educacion Amb...">Licenciatura en ciencias Naturales y Educacion Amb...</option>
                <option @if($data->publicacion->programa_academico == "Licenciatura en educacion fisica, recreacion y dep...") selected @endif value="Licenciatura en educacion fisica, recreacion y dep...">Licenciatura en educacion fisica, recreacion y dep...</option>
                <option @if($data->publicacion->programa_academico == "Microbiologia") selected @endif value="Microbiologia">Microbiologia</option>
                <option @if($data->publicacion->programa_academico == "Instrumentacion Quirurgica") selected @endif value="Instrumentacion Quirurgica">Instrumentacion Quirurgica</option>
                <option @if($data->publicacion->programa_academico == "Enfermeria") selected @endif value="Enfermeria">Enfermeria</option>
                <option @if($data->publicacion->programa_academico == "Ingenieria Electronica") selected @endif value="Ingenieria Electronica">Ingenieria Electronica</option>
                <option @if($data->publicacion->programa_academico == "Ingenieria de Sistemas") selected @endif value="Ingenieria de Sistemas">Ingenieria de Sistemas</option>
                <option @if($data->publicacion->programa_academico == "Ingenieria Ambiental y Sanitaria") selected @endif value="Ingenieria Ambiental y Sanitaria">Ingenieria Ambiental y Sanitaria</option>
                <option @if($data->publicacion->programa_academico == "Comercio Internacional") selected @endif value="Comercio Internacional">Comercio Internacional</option>
                <option @if($data->publicacion->programa_academico == "Contaduria Publica") selected @endif value="Contaduria Publica">Contaduria Publica</option>
                <option @if($data->publicacion->programa_academico == "Economia") selected @endif value="Economia">Economia</option>
                <option @if($data->publicacion->programa_academico == "Derecho") selected @endif value="Derecho">Derecho</option>
                <option @if($data->publicacion->programa_academico == "Psicologia") selected @endif value="Psicologia">Psicologia</option>
                <option @if($data->publicacion->programa_academico == "Sociologia") selected @endif value="Sociologia">Sociologia</option>
                <option @if($data->publicacion->programa_academico == "Ingenieria Agroindustrial") selected @endif value="Ingenieria Agroindustrial">Ingenieria Agroindustrial</option>
                <option @if($data->publicacion->programa_academico == "Administración de comercio internacional") selected @endif value="Administración de comercio internacional">Administración de comercio internacional</option>
            </select>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
            <input type="hidden" name="formacion_academica" id="formacion_academica" >
            <label>Formación académica del solicitante</label>
            <select data-placeholder="Seleccione una o más..." id="select_formacion_academica" class="form-control select2" multiple required @if($data->readonly == true) disabled @endif>
                <option @if(strpos($data->publicacion->formacion_academica, "Profesional") !== false) selected @endif value="Profesional">Profesional</option>
                <option @if(strpos($data->publicacion->formacion_academica, "Especialización") !== false) selected @endif value="Especialización">Especialización</option>
                <option @if(strpos($data->publicacion->formacion_academica, "Maestría") !== false) selected @endif value="Maestría">Maestría</option>
                <option @if(strpos($data->publicacion->formacion_academica, "Doctorado") !== false) selected @endif value="Doctorado">Doctorado</option>
            </select>
        </div>
        <div class="col-12 col-sm-6">
            <label>Numero de celular</label>
            <input name="telefono" id="telefono" class="form-control" type="number"
                onfocus="focused(this)" onfocusout="defocused(this)" value="{{ $data->publicacion->telefono }}" required @if($data->readonly == true) disabled @endif>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
            <label>Correo electrónico</label>
            <input name="email" id="email" class="multisteps-form__input form-control" type="text"
                onfocus="focused(this)" value="{{ $data->publicacion->email }}" onfocusout="defocused(this)" @if($data->readonly == true) disabled @endif>
        </div>
        <div class="col-12 col-sm-6">
            <label>Dirección de correspondencia</label>
            <input name="direccion" id="direccion" class="form-control" type="text"
                onfocus="focused(this)" value="{{ $data->publicacion->direccion }}" onfocusout="defocused(this)" @if($data->readonly == true) disabled @endif>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-12 col-sm-6">
            <label>Departamento</label>
            <select data-placeholder="Seleccione..." onchange="pintarMunicipios(this.value, 'select-municipio')" id="select-departamento" name="departamento" class="form-control select2" required @if($data->readonly == true) disabled @endif></select>
        </div>
        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
            <label>Municipio</label>
            <select data-placeholder="Seleccione..." id="select-municipio" name="municipio" class="form-control select2" required @if($data->readonly == true) disabled @endif></select>
        </div>
    </div>
    <hr class="horizontal dark mt-4">
    {{ view('publicaciones.tabs.tabla-coautores', compact(['data'])) }}
    <hr class="horizontal dark mt-4">
    {{ view('publicaciones.tabs.tabla-colaborades', compact(['data'])) }}
</div>

<script>
    function validacionesTab1() {
        if($("#titulo_obra").val() == "") agregarErrorFormulario("Identificación de la obra", "El titulo de la obra es un campo obligatorio")
        if($("#id_dominio_area_conocimiento").val() == "") agregarErrorFormulario("Identificación de la obra", "El area del conocimiento de la obra es un campo obligatorio")
        if($("#id_dominio_subarea_conocimiento").val() == "") agregarErrorFormulario("Identificación de la obra", "La Sub área del conocimiento de la obra es un campo obligatorio")
        if($("#programa_academico").val() == null) agregarErrorFormulario("Identificación de la obra", "El programa académico es un campo obligatorio")
        if($("#select_formacion_academica").val().length == 0) agregarErrorFormulario("Identificación de la obra", "La formacion académica es un campo obligatorio")
        if($("#telefono").val() == "") agregarErrorFormulario("Identificación de la obra", "El numero de celular es un campo obligatorio")
        if($("#email").val() == "") agregarErrorFormulario("Identificación de la obra", "El correo electrónico es un campo obligatorio")
        if($("#direccion").val() == "") agregarErrorFormulario("Identificación de la obra", "La dirección de correspondencia es un campo obligatorio")
        if($("#select-departamento").val() == null) agregarErrorFormulario("Identificación de la obra", "El departamento es un campo obligatorio")
        if($("#select-municipio").val() == null) agregarErrorFormulario("Identificación de la obra", "El municipio es un campo obligatorio")
        $("#formacion_academica").val($("#select_formacion_academica").val().join("-"))
    }
</script>