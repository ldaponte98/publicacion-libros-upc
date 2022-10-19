@extends('layout.principal')
@section('content')
<style>
    .tabs{ display: none; }
    .oculto { display: none; }
    .error{ color: red; }
    .alert-danger{ color: white;  }
    .color-black{ color: black;  }
</style>
<form id="form-publicaciones" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-sm-6">
            <h5 class="font-weight-bolder mb-0">Formato de solicitud</h5>
        </div>
        @if($data->publicacion->estado != null) 
        <div class="col-sm-6 text-end">
            @if($data->publicacion->estado == "ENVIADA A COMITE EDITORIAL") 
                <button class="btn btn-warning ms-auto mb-0 js-btn-next color-black" type="button">ENVIADA A COMITE EDITORIAL</button>
            @endif
            @if($data->publicacion->estado == "RECHAZADA POR COMITE EDITORIAL") 
                <button class="btn btn-danger ms-auto mb-0 js-btn-next color-black" type="button">RECHAZADA POR COMITE EDITORIAL</button>
            @endif
            @if($data->publicacion->estado == "APROBADA - SIN ENVIO A EVALUADORES") 
                <button class="btn btn-info ms-auto mb-0 js-btn-next color-black" type="button">APROBADA - SIN ENVIO A EVALUADORES</button>
            @endif
            @if($data->publicacion->estado == "APROBADA - EN REVISION POR EVALUADORES") 
                <button class="btn btn-warning ms-auto mb-0 js-btn-next color-black" type="button">APROBADA - EN REVISION POR EVALUADORES</button>
            @endif
            @if($data->publicacion->estado == "APROBADA") 
                <button class="btn btn-success ms-auto mb-0 js-btn-next color-black" type="button">APROBADA</button>
            @endif
            @if($data->publicacion->estado == "RECHAZADA POR EVALUADORES") 
                <button class="btn btn-danger ms-auto mb-0 js-btn-next color-black" type="button">RECHAZADA POR EVALUADORES</button>
            @endif
            @if($data->publicacion->estado == "ANULADA") 
                <button class="btn btn-danger ms-auto mb-0 js-btn-next color-black" type="button">ANULADA</button>
            @endif
        </div>
        @endif
    </div>
    
    <div id="tab-1" class="tabs">{{ view('publicaciones.tabs.identificacion-obra', compact(['data'])) }}</div>
    <div id="tab-2" class="tabs">{{ view('publicaciones.tabs.tipo-obra', compact(['data'])) }}</div>
    <div id="tab-3" class="tabs">{{ view('publicaciones.tabs.publico-obra', compact(['data'])) }}</div>
    <div id="tab-4" class="tabs">{{ view('publicaciones.tabs.formato-obra', compact(['data'])) }}</div>
    <div id="tab-5" class="tabs">{{ view('publicaciones.tabs.informacion-tecnica', compact(['data'])) }}</div>
    <div id="tab-6" class="tabs">{{ view('publicaciones.tabs.informacion-complementaria', compact(['data'])) }}</div>
    <div id="tab-7" class="tabs">{{ view('publicaciones.tabs.anexos', compact(['data'])) }}</div>
    <input type="hidden" name="coautores" id="coautores">
    <input type="hidden" name="colaboradores" id="colaboradores" >
    <div class="alert alert-danger oculto mt-3" id="div-errores" onclick="$('#div-errores').fadeOut()">
        
    </div>
    <div class="button-row mt-4" style="text-align: end;">
        <button id="btn-anterior" style="display: none;" class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" onclick="anterior()" type="button"
            title="Next">Anterior</button>
        <button id="btn-siguiente" class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" onclick="siguiente()" type="button"
            title="Next">Siguiente</button>
        @if($data->aprobar_rechazar)
            <button id="btn-aprobar" class="btn btn-success ms-auto mb-0 js-btn-next" onclick="aprobar()" type="button"
                title="Next">Aprobar</button>
            <button id="btn-rechazar" class="btn btn-danger ms-auto mb-0 js-btn-next" onclick="$('#modal-rechazo').modal('show')" type="button"
            title="Next">Rechazar</button>
            {{ view('publicaciones.configuraciones.modal-rechazar', compact(['data'])) }}
        @endif

        @if($data->permiso_enviar_evaluadores)
            <button id="btn-enviar-evaluadores" class="btn btn-warning ms-auto mb-0 js-btn-next" onclick="enviarEvaluadores()" type="button"
            title="Next">Enviar a evaluadores</button>
        @endif

        @if($data->permiso_calificar)
            <a id="btn-calificar" class="btn btn-warning ms-auto mb-0 js-btn-next" href="{{ route('publicacion/calificar', $data->publicacion->id) }}" type="button"
            title="Next">Calificar</a>
        @endif
    </div>
</form>

<script>
    var tab_actual = 0
    var tab_ultima = 7
    var departamentos = []
    var erroresFormulario = []

    $(document).ready(() => {
        buscarDepartamentos()
        setTimeout(() => {
            @if($data->publicacion->departamento == null) 
                pintarMunicipios(this.departamentos[0].departamento, "select-municipio")
                pintarMunicipios(this.departamentos[0].departamento, "select-coautor-municipio")
            @else
                pintarMunicipios("{{ $data->publicacion->departamento }}", "select-municipio")
                pintarMunicipios("{{ $data->publicacion->departamento }}", "select-coautor-municipio")
            @endif
            
        }, 1 * 1000);
        siguiente()
    })

    function buscarDepartamentos() {
        let url = "{{ config('global.url_base') }}/departamentos-ciudades.json"
        $.get(url).then((response) => {
            this.departamentos = response
            pintarDepartamentos()
        })
    }

    function pintarDepartamentos(){
        let resultado = ""
        this.departamentos.forEach((item) => {
            let selected = "{{ $data->publicacion->departamento }}"
            resultado += `<option ${selected == item.departamento ? 'selected' : ''} value="${item.departamento}">${item.departamento}</option>`
        })
        $("#select-departamento").html(resultado)
        $("#select-coautor-departamento").html(resultado)
    }

    function pintarMunicipios(dpto, id) {
        let resultado = ""
        let departamento = this.departamentos.find(p => p.departamento == dpto)
        if (departamento) {
            let selected = "{{ $data->publicacion->municipio }}"
            departamento.ciudades.forEach((item) => {
                console.log(item)
                resultado += `<option ${selected == item ? 'selected' : ''} value="${item}">${item}</option>`
            })
        }
        $("#" + id).html(resultado)
    }

    function siguiente() {
        if(validarFomularioIndividualTab()){
            tab_actual++
            validarTab()
        }
    }

    function anterior() {
        tab_actual--
        validarTab()
    }

    function validarTab() {
        if (tab_actual != tab_ultima + 1) {
            $(`.tabs`).fadeOut()
            $(`#tab-${tab_actual}`).fadeIn()
            $("#btn-siguiente").fadeIn();
            if (tab_actual != 1) $("#btn-anterior").fadeIn(); else $("#btn-anterior").fadeOut();
            if (tab_actual == tab_ultima){
                @if($data->readonly == true) 
                    $("#btn-siguiente").fadeOut(); 
                @else
                    $("#btn-siguiente").html("Enviar solicitud"); 
                @endif
            }else{
                $("#btn-siguiente").html("Siguiente")
            } 
        }else{
            tab_actual--
            enviarSolicitud()
        }        
    }

    function agregarErrorFormulario(nombreTab, mensaje) {
        this.erroresFormulario.push(`<li>[${nombreTab}] -> ${mensaje}</li>`)
    }

    function validarFomularioIndividualTab() {
        @if($data->readonly == true) return true; @endif
        this.erroresFormulario = []
        if (tab_actual == 1) validacionesTab1()
        if (tab_actual == 2) validacionesTab2()
        if (tab_actual == 3) validacionesTab3()
        if (tab_actual == 4) validacionesTab4()
        if (tab_actual == 5) validacionesTab5()
        if (tab_actual == 6) validacionesTab6()
        if (tab_actual == 7) validacionesTab7()
        if(this.erroresFormulario.length > 0){
            visualizarErrores()
            return false
        }
        return true
    }

    function validarTabs() {
        validacionesTab1()
        validacionesTab2()
        validacionesTab3()
        validacionesTab4()
        validacionesTab5()
        validacionesTab6()
        validacionesTab7()
    }

    function visualizarErrores(nombreTab, mensaje) {
        let errores = ""
        this.erroresFormulario.forEach((error) => {
            errores += error
        })
        $("#div-errores").html(errores)
        $("#div-errores").fadeIn()
        setTimeout(() => {
            $("#div-errores").fadeOut()
        }, 15 * 1000);
    }

    function enviarSolicitud() {
        this.erroresFormulario = []
        validarTabs()
        if(this.erroresFormulario.length > 0){
            visualizarErrores()
            return false
        }
        let json_coautores = JSON.stringify(this.coautores)
        let json_colaboradores = JSON.stringify(this.colaboradores)
        $("#coautores").val(json_coautores)
        $("#colaboradores").val(json_colaboradores)
        $("#form-publicaciones").submit()
    } 

    @if($data->aprobar_rechazar)
        function aprobar() {
            let confirmacion = confirm("¿Seguro que desea aprobar la publicación y notificar al docente las razones?")
            if(confirmacion){
                let url = "{{ route('publicacion/aprobar') }}"
                var _token = ""
                $("[name='_token']").each(function() { _token = this.value })
                let request = {
                    '_token' : _token,
                    'id' : "{{ $data->publicacion->id }}"
                }
                $("#btn-aprobar").html("Aprobando, por favor espere...")
                $.post(url, request, (response) => {
                    $("#btn-aprobar").html("Aprobar")
                    if(response.error == false){
                        alerta("Exito", response.mensaje)
                        location.reload()
                    }else{
                        alerta("Error", response.mensaje)
                    }
                })
                .fail((error) => {
                    $("#btn-aprobar").html("Aprobar")
                    alerta("Error", "Ocurrio un error al aprobar la publicación, intentalo mas tarde")
                })
            }
        }
    @endif

    @if($data->permiso_enviar_evaluadores)
        function enviarEvaluadores() {
            let confirmacion = confirm("¿Seguro que desea enviar la publicación a los evaluadores?")
            if(confirmacion){
                let url = "{{ route('publicacion/enviar-evaluadores') }}"
                var _token = ""
                $("[name='_token']").each(function() { _token = this.value })
                let request = {
                    '_token' : _token,
                    'id' : "{{ $data->publicacion->id }}"
                }
                $("#btn-enviar-evaluadores").html("Enviando, por favor espere...")
                $.post(url, request, (response) => {
                    $("#btn-enviar-evaluadores").html("Enviar a evaluadores")
                    if(response.error == false){
                        alerta("Exito", response.mensaje)
                        location.reload()
                    }else{
                        alerta("Error", response.mensaje)
                    }
                })
                .fail((error) => {
                    $("#btn-enviar-evaluadores").html("Enviar a evaluadores")
                    alerta("Error", "Ocurrio un error al enviar a evaluadores la publicación, intentalo mas tarde")
                })
            }
        }
    @endif
</script>
@endsection
