@extends('layout.principal')
@section('content')
<style>
    .tabs{ display: none; }
</style>
<form class="multisteps-form__form mb-8" id="form">
    <h5 class="font-weight-bolder mb-0">Formato de solicitud</h5>
    <div id="tab-1" class="tabs">{{ view('publicaciones.tabs.identificacion-obra') }}</div>
    <div id="tab-2" class="tabs">{{ view('publicaciones.tabs.tipo-obra') }}</div>
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
    }

    function pintarMunicipios(dpto) {
        let resultado = ""
        let departamento = this.departamentos.find(p => p.departamento == dpto)
        if (departamento) {
            departamento.ciudades.forEach((item) => {
            resultado += `<option value="${item}">${item}</option>`
        })
        }
        $("#select-municipio").html(resultado)
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
        $(`.tabs`).fadeOut()
        $(`#tab-${tab_actual}`).fadeIn()
        if (tab_actual != 1) $("#btn-anterior").fadeIn(); else $("#btn-anterior").fadeout();
    }
    
</script>
@endsection
