<div class="modal fade" tabindex="-10" id="modal-form-colaborador">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Gestión Colaboradores</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i></button>
        </div>
        <div class="modal-body">
            <div class="row mt-0">
                <div class="col-12 col-sm-12 mt-2">
                    <label>Nombres y apellidos</label>
                    <input id="colaborador-nombres" class="form-control" type="text"
                        onfocus="focused(this)" onfocusout="defocused(this)">
                </div>
                <div class="col-12 col-sm-12 mt-2">
                    <label>Numero de celular</label>
                    <input id="colaborador-telefono" class="form-control" type="number"
                        onfocus="focused(this)" onfocusout="defocused(this)">
                </div>
                <div class="col-12 col-sm-12 mt-2">
                    <label>Actividad desarrollada en la obra</label>
                    <input id="colaborador-actividad" class="form-control" type="text"
                        onfocus="focused(this)" onfocusout="defocused(this)">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btn-cerrar-modal-Colaborador">Cerrar</button>
            <button type="button" class="btn btn-info" onclick="validarCamposColaborador()">Guardar cambios</button>
        </div>
        </div>
    </div>
</div>

<div class="row mt-3">
    @if($data->readonly != true)
        <div class="col-sm-12">
            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modal-form-colaborador">+ Agregar Colaborador</button>
        </div>
    @endif
    <h5><b>Colaboradores</b></h5>
    <div class="table-responsive">
        <table class="table align-items-center mb-0" id="tabla-Colaborador">
            <thead>
                <tr>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nombres y apellidos</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Numero de celular</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actividad desarrollada en la obra</th>
                    <th class="text-secondary opacity-7"></th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

<script>
    var colaboradores = []
    var posicionColaboradorEscojido = null
    
    $(document).ready(() => {
        pintarColaboradoresAntiguos()
    })

    function actualizarTablaColaboradores() {
        let tabla = ""
        this.colaboradores.forEach((p, pos) => {
            let opciones = `
            <td class='text-center'>
                <button class='btn btn-info' type='button' onclick='editarColaborador(${pos})' class='btn-into'>
                    <i class='fa fa-edit'></i>
                </button>
                <button class='btn btn-danger' type='button' onclick='eliminarColaborador(${pos})' class='btn-into'>
                    <i class='fa fa-trash'></i>
                </button>
            </td>`
            @if($data->readonly == true) opciones = ''; @endif
            tabla += `
                <tr>
                    <td class='text-center'>${p.nombres}</td>
                    <td class='text-center'>${p.telefono}</td>
                    <td class='text-center'>${p.actividad}</td>
                    ${opciones}
                </tr>`
        })
        $("#tabla-Colaborador tbody").html(tabla)
    }

    function validarCamposColaborador() {
        if($('#colaborador-nombres').val().trim() == "") { alerta("Error", "El campo nombres y apellidos es obligatorio"); return false; }
        if($('#colaborador-telefono').val().trim() == "") { alerta("Error", "El campo numero de celular es obligatorio"); return false; }
        if($('#colaborador-actividad').val().trim() == "") { alerta("Error", "El campo actividad desarrollada en la obra es obligatorio"); return false; }
        agregarColaborador()
    }

    function agregarColaborador() {
        let registro = {
            'nombres' : $('#colaborador-nombres').val(),
            'telefono' : $('#colaborador-telefono').val(),
            'actividad' : $('#colaborador-actividad').val()
        }
        $("#btn-cerrar-modal-Colaborador").click()
        if(posicionColaboradorEscojido == null){
            colaboradores.push(registro)
        }else{
            colaboradores.splice(posicionColaboradorEscojido, 1, registro)
            posicionColaboradorEscojido = null
        }
        actualizarTablaColaboradores()
    }

    function editarColaborador(posicion) {
        posicionColaboradorEscojido = posicion
        let busqueda = this.colaboradores[posicion]
        $('#colaborador-nombres').val(busqueda.nombres)
        $('#colaborador-telefono').val(busqueda.telefono)
        $('#colaborador-actividad').val(busqueda.actividad)
        $("#modal-form-colaborador").modal('show')
    }

    function eliminarColaborador(posicion) {
        let confirmacion = confirm("¿Seguro desea eliminar este colaborador?")
        if(confirmacion){
            colaboradores.splice(posicion, 1)
            actualizarTablaColaboradores()
        }
    }

    function pintarColaboradoresAntiguos() {
        @foreach ($data->publicacion->personas as $persona)
            @if($persona->tipo == 'COLABORADOR')
                colaboradores.push({
                    'nombres' : "{{ $persona->nombres }}",
                    'telefono' : "{{ $persona->telefono }}",
                    'actividad' : "{{ $persona->actividad }}"
                })
            @endif
        @endforeach
        actualizarTablaColaboradores()
    }
</script>