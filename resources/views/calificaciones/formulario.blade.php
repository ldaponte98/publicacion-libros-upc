@extends('layout.principal')
@section('content')
<style>
    .tabs{ display: none; }
    .oculto { display: none; }
    .error{ color: red; }
    .alert-danger{ color: white;  }
    .color-black{ color: black;  }
</style>
<form id="form-calificaciones" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-sm-6">
            <h5 class="font-weight-bolder mb-0">Formato de evaluación académica de publicaciones</h5>
        </div>
        @if($data->publicacion->estado != null) 
        <div class="col-sm-6 text-end">
            <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next color-black" type="button">Calificacion: {{ $data->calificacion->estado }}</button>
        </div>
        @endif
    </div>
    
    <div id="tab-1" class="tabs">{{ view("calificaciones.tabs.datos-basicos", compact(['data'])) }}</div>
    <div id="tab-2" class="tabs">{{ view("calificaciones.tabs.datos-basicos-evaluador", compact(['data'])) }}</div>
    <div id="tab-3" class="tabs">{{ view("calificaciones.tabs.tipo-obra", compact(['data'])) }}</div>
    <div id="tab-4" class="tabs">{{ view("calificaciones.tabs.evaluacion", compact(['data'])) }}</div>
    <div class="alert alert-danger oculto mt-3" id="div-errores" onclick="$('#div-errores').fadeOut()">
        
    </div>
    <div class="button-row mt-4" style="text-align: end;">
        <button id="btn-anterior" style="display: none;" class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" onclick="anterior()" type="button"
            title="Next">Anterior</button>
        <button id="btn-siguiente" class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" onclick="siguiente()" type="button"
            title="Next">Siguiente</button>
    </div>
</form>

<script>
    var tab_actual = 3
    var tab_ultima = 4
    var departamentos = []
    var erroresFormulario = []

    $(document).ready(() => {
        siguiente()
    })
    
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
                    $("#btn-siguiente").html("Calificar"); 
                @endif
            }else{
                $("#btn-siguiente").html("Siguiente")
            } 
        }else{
            tab_actual--
            calificar()
        }        
    }

    function agregarErrorFormulario(nombreTab, mensaje) {
        this.erroresFormulario.push(`<li>[${nombreTab}] -> ${mensaje}</li>`)
    }

    function validarFomularioIndividualTab() {
        @if($data->readonly == true) return true; @endif
        this.erroresFormulario = []
        if (tab_actual == 1) validacionesTab1()
        //if (tab_actual == 2) validacionesTab2()
        //if (tab_actual == 3) validacionesTab3()
        if (tab_actual == 4) validacionesTab4()
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

    function calificar() {
        this.erroresFormulario = []
        validarTabs()
        if(this.erroresFormulario.length > 0){
            visualizarErrores()
            return false
        }
        $("#form-calificaciones").submit()
    } 
</script>
@endsection
