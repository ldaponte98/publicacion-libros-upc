<div class="modal fade" tabindex="-10" id="modal-form-coautor">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Gestión coautores</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i></button>
        </div>
        <div class="modal-body">
            <div class="row mt-0">
                <div class="col-12 col-sm-12 mt-2">
                    <label>Nombres y apellidos</label>
                    <input id="coautor-nombres" class="form-control" type="text"
                        onfocus="focused(this)" onfocusout="defocused(this)">
                </div>
                <div class="col-12 col-sm-12 mt-2">
                    <label>Numero de celular</label>
                    <input id="coautor-telefono" class="form-control" type="number"
                        onfocus="focused(this)" onfocusout="defocused(this)">
                </div>
                <div class="col-12 col-sm-12 mt-2">
                    <label>Correo electrónico</label>
                    <input id="coautor-email" class="form-control" type="text"
                        onfocus="focused(this)" onfocusout="defocused(this)">
                </div>
                <div class="col-12 col-sm-12 mt-2">
                    <label>Dirección de correspondencia</label>
                    <input id="coautor-direccion" class="form-control" type="text"
                        onfocus="focused(this)" onfocusout="defocused(this)">
                </div>
                <div class="col-12 col-sm-12 mt-2">
                    <label>Departamento</label>
                    <select data-placeholder="Seleccione..." onchange="pintarMunicipios(this.value, 'select-coautor-municipio')" id="select-coautor-departamento" class="form-control select2"></select>
                </div>
                <div class="col-12 col-sm-12 mt-2">
                    <label>Ciudad</label>
                    <select data-placeholder="Seleccione..." id="select-coautor-municipio" class="form-control select2"></select>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btn-cerrar-modal-coautor">Cerrar</button>
            <button type="button" class="btn btn-info" onclick="validarCamposCoautor()">Guardar cambios</button>
        </div>
        </div>
    </div>
</div>

<div class="row mt-3">
    @if($data->readonly != true)
        <div class="col-sm-12">
            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modal-form-coautor">+ Agregar coautor</button>
        </div>
    @endif
    <h5><b>Coautores</b></h5>
    <div class="table-responsive">
        <table class="table align-items-center mb-0" id="tabla-coautor">
            <thead>
                <tr>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nombres y apellidos</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Numero de celular</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Correo electrónico</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Dirección de correspondencia</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ciudad</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Departamento</th>
                    <th class="text-secondary opacity-7"></th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

<script>
    var coautores = []
    var posicionCoautorEscojido = null

    $(document).ready(() => {
        pintarCoautoresAntiguos()
    })

    function actualizarTablaCoautores() {
        let tabla = ""
        this.coautores.forEach((p, pos) => {
            let opciones = `
            <td class='text-center'>
                <button class='btn btn-info' type='button' onclick='editarCoautor(${pos})' class='btn-into'>
                    <i class='fa fa-edit'></i>
                </button>
                <button class='btn btn-danger' type='button' onclick='eliminarCoautor(${pos})' class='btn-into'>
                    <i class='fa fa-trash'></i>
                </button>
            </td>`
            @if($data->readonly == true) opciones = ''; @endif
            tabla += `
                <tr>
                    <td class='text-center'>${p.nombres}</td>
                    <td class='text-center'>${p.telefono}</td>
                    <td class='text-center'>${p.email}</td>
                    <td class='text-center'>${p.direccion}</td>
                    <td class='text-center'>${p.municipio}</td>
                    <td class='text-center'>${p.departamento}</td>
                    ${opciones}
                </tr>`
        })
        $("#tabla-coautor tbody").html(tabla)
    }

    function validarCamposCoautor() {
        if($('#coautor-nombres').val().trim() == "") { alerta("Error", "El campo nombres y apellidos es obligatorio"); return false; }
        if($('#coautor-telefono').val().trim() == "") { alerta("Error", "El campo numero de celular es obligatorio"); return false; }
        if($('#coautor-email').val().trim() == "") { alerta("Error", "El campo correo electrónico es obligatorio"); return false; }
        if($('#coautor-direccion').val().trim() == "") { alerta("Error", "El campo dirección de residencia es obligatorio"); return false; }
        if($('#select-coautor-departamento').val() == null) { alerta("Error", "El campo departamento es obligatorio"); return false; }
        if($('#select-coautor-municipio').val() == null) { alerta("Error", "El campo ciudad es obligatorio"); return false; }
        agregarCoautor()
    }

    function agregarCoautor() {
        let registro = {
            'nombres' : $('#coautor-nombres').val(),
            'telefono' : $('#coautor-telefono').val(),
            'email' : $('#coautor-email').val(),
            'direccion' : $('#coautor-direccion').val(),
            'departamento' : $('#select-coautor-departamento').val(),
            'municipio' : $('#select-coautor-municipio').val()
        }
        $("#btn-cerrar-modal-coautor").click()
        if(posicionCoautorEscojido == null){
            coautores.push(registro)
        }else{
            coautores.splice(posicionCoautorEscojido, 1, registro)
            posicionCoautorEscojido = null
        }
        actualizarTablaCoautores()
    }

    function editarCoautor(posicion) {
        posicionCoautorEscojido = posicion
        let busqueda = this.coautores[posicion]
        $('#coautor-nombres').val(busqueda.nombres)
        $('#coautor-telefono').val(busqueda.telefono)
        $('#coautor-email').val(busqueda.email)
        $('#coautor-direccion').val(busqueda.direccion)
        $('#select-coautor-departamento').val(busqueda.departamento).change()
        $('#select-coautor-municipio').val(busqueda.municipio).change()
        $("#modal-form-coautor").modal('show')
    }

    function eliminarCoautor(posicion) {
        let confirmacion = confirm("¿Seguro desea eliminar este coautor?")
        if(confirmacion){
            alert("Dd")
            coautores.splice(posicion, 1)
            actualizarTablaCoautores()
        }
    }

    function pintarCoautoresAntiguos() {
        @foreach ($data->publicacion->personas as $persona)
            @if($persona->tipo == 'COAUTOR')
                coautores.push({
                    'nombres' : "{{ $persona->nombres }}",
                    'telefono' : "{{ $persona->telefono }}",
                    'email' : "{{ $persona->email }}",
                    'direccion' : "{{ $persona->direccion }}",
                    'departamento' : "{{ $persona->departamento }}",
                    'municipio' : "{{ $persona->municipio }}"
                })
            @endif
        @endforeach
        actualizarTablaCoautores()
    }
</script>