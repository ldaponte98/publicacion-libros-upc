<p class="mb-0 text-sm">IDENTIFICACION DE LA OBRA, AUTORES Y COLABORADORES.</p>
<div class="multisteps-form__content">
    <div class="row mt-3">
        <div class="col-12 col-sm-6">
            <label>Título de la obra</label>
            <input name="titulo_obra" class="form-control" type="text"
                    onfocus="focused(this)" onfocusout="defocused(this)" required>
        </div>
        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
            <label>Área del conocimiento de la obra</label>
            <select name="id_dominio_area_conocimiento" class="form-control select2" required>
                @php $items = \App\Models\Dominio::all()->where('padre_id', 1); @endphp
                @foreach ($items as $item)
                    <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12 col-sm-6">
            <label>Sub área del conocimiento de la obra</label>
            <select name="id_dominio_subarea_conocimiento" class="form-control select2" required>
                @php $items = \App\Models\Dominio::all()->where('padre_id', 5); @endphp
                @foreach ($items as $item)
                    <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-12 col-sm-6">
            <label>Programa Académico y Facultad a la que está adscrito el solicitante</label>
            <select name="programa_academico" class="form-control select2" required>
                <option value="Administracion de Empresa">Administracion de Empresa</option>
                <option value="Licenciatura en Matematicas y Fisica">Licenciatura en Matematicas y Fisica</option>
                <option value="Licenciatura en Espanol e Ingles">Licenciatura en Espanol e Ingles</option>
                <option value="Licenciatura en ciencias Naturales y Educacion Amb...">Licenciatura en ciencias Naturales y Educacion Amb...</option>
                <option value="Licenciatura en educacion fisica, recreacion y dep...">Licenciatura en educacion fisica, recreacion y dep...</option>
                <option value="Microbiologia">Microbiologia</option>
                <option value="Instrumentacion Quirurgica">Instrumentacion Quirurgica</option>
                <option value="Enfermeria">Enfermeria</option>
                <option value="Ingenieria Electronica">Ingenieria Electronica</option>
                <option value="Ingenieria de Sistemas">Ingenieria de Sistemas</option>
                <option value="Ingenieria Ambiental y Sanitaria">Ingenieria Ambiental y Sanitaria</option>
                <option value="Comercio Internacional">Comercio Internacional</option>
                <option value="Contaduria Publica">Contaduria Publica</option>
                <option value="Economia">Economia</option>
                <option value="Derecho">Derecho</option>
                <option value="Psicologia">Psicologia</option>
                <option value="Sociologia">Sociologia</option>
                <option value="Ingenieria Agroindustrial">Ingenieria Agroindustrial</option>
                <option value="Administración de comercio internacional">Administración de comercio internacional</option>
            </select>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
            <label>Formación académica del solicitante</label>
            <select data-placeholder="Seleccione una o más..." name="formacion_academica" class="form-control select2" multiple required>
                <option value="Profesional">Profesional</option>
                <option value="Especialización">Especialización</option>
                <option value="Maestría">Maestría</option>
                <option value="Doctorado">Doctorado</option>
            </select>
        </div>
        <div class="col-12 col-sm-6">
            <label>Numero de celular</label>
            <input name="telefono" class="form-control" type="number"
                onfocus="focused(this)" onfocusout="defocused(this)">
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
            <label>Correo electrónico</label>
            <input name="email" class="multisteps-form__input form-control" type="text"
                onfocus="focused(this)" onfocusout="defocused(this)">
        </div>
        <div class="col-12 col-sm-6">
            <label>Dirección de correspondencia</label>
            <input name="direccion" class="form-control" type="number"
                onfocus="focused(this)" onfocusout="defocused(this)">
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-12 col-sm-6">
            <label>Departamento</label>
            <select data-placeholder="seleccione..." onchange="pintarMunicipios(this.value, 'select-municipio')" id="select-departamento" name="departamento" class="form-control select2" required></select>
        </div>
        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
            <label>Municipio</label>
            <select data-placeholder="Seleccione..." id="select-municipio" name="municipio" class="form-control select2" required></select>
        </div>
    </div>
    <hr class="horizontal dark mt-4">
    
    {{ view('publicaciones.tabs.tabla-coautores') }}

</div>