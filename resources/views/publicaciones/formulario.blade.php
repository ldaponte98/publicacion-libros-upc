@extends('layout.principal')
@section('content')
<style>
    .tabs{ display: none; }
</style>
<form id="form-PUBLICACIONES">
    <h5 class="font-weight-bolder mb-0">Formato de solicitud</h5>
    <div id="tab-1" class="tabs">{{ view('publicaciones.tabs.identificacion-obra') }}</div>
    <div id="tab-2" class="tabs">{{ view('publicaciones.tabs.tipo-obra') }}</div>
    <div id="tab-3" class="tabs">{{ view('publicaciones.tabs.publico-obra') }}</div>
    <div id="tab-4" class="tabs">{{ view('publicaciones.tabs.formato-obra') }}</div>
    <div id="tab-5" class="tabs">{{ view('publicaciones.tabs.informacion-tecnica') }}</div>
    <div id="tab-6" class="tabs">{{ view('publicaciones.tabs.informacion-complementaria') }}</div>
    <div id="tab-7" class="tabs">{{ view('publicaciones.tabs.anexos') }}</div>
    <div class="button-row mt-4" style="text-align: end;">
        <button id="btn-anterior" style="display: none;" class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" onclick="anterior()" type="button"
            title="Next">Anterior</button>
        <button id="btn-siguiente" class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" onclick="siguiente()" type="button"
            title="Next">Siguiente</button>
    </div>
</form>

<script>
    var tab_actual = 0
    var tab_ultima = 7
    var departamentos = []
    $(document).ready(() => {
        buscarDepartamentos()
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
            resultado += `<option value="${item.departamento}">${item.departamento}</option>`
        })
        $("#select-departamento").html(resultado)
        $("#select-coautor-departamento").html(resultado)
    }

    function pintarMunicipios(dpto, id) {
        let resultado = ""
        let departamento = this.departamentos.find(p => p.departamento == dpto)
        if (departamento) {
            departamento.ciudades.forEach((item) => {
                resultado += `<option value="${item}">${item}</option>`
            })
        }
        $("#" + id).html(resultado)
    }

    function siguiente() {
        tab_actual++
        validarTab()
    }

    function anterior() {
        tab_actual--
        validarTab()
    }

    function validarTab() {
        if (tab_actual != tab_ultima + 1) {
            $(`.tabs`).fadeOut()
            $(`#tab-${tab_actual}`).fadeIn()
            if (tab_actual != 1) $("#btn-anterior").fadeIn(); else $("#btn-anterior").fadeOut();
            if (tab_actual == tab_ultima) $("#btn-siguiente").html("Enviar solicitud"); else $("#btn-siguiente").html("Siguiente")
        }else{
            enviarSolicitud()
        }        
    }


    function alerta(titulo, mensaje, tipo) {
        alert(mensaje)
    }

    function enviarSolicitud() {
        alert("Guardando")
    }
    
</script>
@endsection
