@extends('layout.principal')
@section('content')
@csrf
<div class="card-header pb-0">
  <h6>Publicaciones docentes</h6>
</div>
<div class="row">
  <div class="col-9">
    <a id="btn-enviar" class="btn bg-gradient-dark mb-0" style="display: none;" onclick="enviarEvaluadores()">
        <i class="fas fa-send" aria-hidden="true"></i>&nbsp;&nbsp;<b id="btn-enviar">Enviar a evaluadores los seleccionados</b>
      </a>
  </div>
  <div class="col-3 btn-end">
    <input type="text" class="form-control" placeholder="Buscar..." id="filtro-publicaciones-docentes">
  </div>
</div>
<div class="row">
  <div class="col-sm-4">
    <div class="form-group">
      <label>Estado</label>
      <select id="estado" class="form-control select2" onchange="filtrar()">
        <option value="">TODOS</option>
        <option value="APROBADA - SIN ENVIO A EVALUADORES">APROBADA - SIN ENVIO A EVALUADORES</option>
        <option value="ENVIADA A COMITE EDITORIAL">ENVIADA A COMITE EDITORIAL</option>
        <option value="RECHAZADA POR COMITE EDITORIAL">RECHAZADA POR COMITE EDITORIAL</option>
        <option value="APROBADA - SIN ENVIO A EVALUADORES">APROBADA - SIN ENVIO A EVALUADORES</option>
        <option value="APROBADA - EN REVISION POR EVALUADORES">APROBADA - EN REVISION POR EVALUADORES</option>
        <option value="APROBADA">APROBADA</option>
        <option value="RECHAZADA POR EVALUADORES">RECHAZADA POR EVALUADORES</option>
        <option value="ANULADA">ANULADA</option>
      </select>
    </div>
  </div>
</div>
<div class="card-body px-0 pt-0 pb-2 mt-3">
  <div class="table-responsive p-0">
    <table class="table align-items-center mb-0" id="tabla-publicaciones-docentes">
      <thead>
        <tr>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"><input id="check_todos" class="checkbox" type="checkbox" onchange="marcarTodos()"></th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Docente</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Titulo de la obra</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tipo obra</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Fecha creación</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Estado</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($publicaciones as $publicacion)
          <tr>
            <td class="text-center">
                @if($publicacion->estado == "APROBADA - SIN ENVIO A EVALUADORES")
                    <input onchange="validarEnvio()" id="check_{{ $publicacion->id }}" class="checkbox check-publicaciones-docentes" type="checkbox">
                @endif
            </td>
            <td class="text-center">{{ $publicacion->tercero->identificacion }} - {{ $publicacion->tercero->nombreCompleto() }}</td>
            <td class="text-center">{{ $publicacion->titulo_obra }}</td>
            <td class="text-center">{{ $publicacion->tipo_obra }}</td>
            <td class="text-center">{{ date('Y-m-d H:i', strtotime($publicacion->created_at)) }}</td>
            <td class="text-center">
              @if($publicacion->estado == "ENVIADA A COMITE EDITORIAL") 
                <span class="badge badge-sm bg-gradient-warning color-black">{{ $publicacion->estado }}</span>
              @endif
              @if($publicacion->estado == "RECHAZADA POR COMITE EDITORIAL") 
                  <span class="badge badge-sm bg-gradient-danger color-black">{{ $publicacion->estado }}</span>
              @endif
              @if($publicacion->estado == "APROBADA - SIN ENVIO A EVALUADORES") 
                  <span class="badge badge-sm bg-gradient-info color-black">{{ $publicacion->estado }}</span>
              @endif
              @if($publicacion->estado == "APROBADA - EN REVISION POR EVALUADORES") 
                  <span class="badge badge-sm bg-gradient-info color-black">{{ $publicacion->estado }}</span>
              @endif
              @if($publicacion->estado == "APROBADA") 
                  <span class="badge badge-sm bg-gradient-success color-black">{{ $publicacion->estado }}</span>
              @endif
              @if($publicacion->estado == "RECHAZADA POR EVALUADORES") 
                  <span class="badge badge-sm bg-gradient-danger color-black">{{ $publicacion->estado }}</span>
              @endif
              @if($publicacion->estado == "ANULADA") 
                  <span class="badge badge-sm bg-gradient-danger color-black">{{ $publicacion->estado }}</span>
              @endif
            </td>
            <td class="text-center">
              <a class="btn bg-gradient-dark mb-0" href="{{ route('publicacion/detalle', $publicacion->id) }}">
                <i class="fas fa-eye icon-action" aria-hidden="true"></i>
              </a>              
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<script>
  $(document).ready(() => {
    setFiltro("filtro-publicaciones-docentes", "tabla-publicaciones-docentes")
  })
  
  var publicacionesSeleccionadas = []
  function marcarTodos() {
    if($("#check_todos").prop("checked")){
        $(".check-publicaciones-docentes").prop("checked", true)
    }else{
        $(".check-publicaciones-docentes").prop("checked", false)
    }
    validarEnvio()
  }

  function enviarEvaluadores() {
    let checks = $(".check-publicaciones-docentes")
    let listaPublicaciones = []
    for (let i = 0; i < checks.length; i++) {
        let check = checks[i]
        let idPublicacion = check.id.split("_")[1]
        if($("#"+check.id).prop("checked")) listaPublicaciones.push(idPublicacion)
    }

    if(listaPublicaciones.length == 0){
        alerta("Error", "Debe seleccionar por lo menos una publicación en estado [APROBADA - SIN ENVIO A EVALUADORES] para envio")
        return false
    }

    let confirmacion = confirm("¿Seguro que desea enviar las publicaciones seleccionadas a evaluadores?")
    if(confirmacion){
        $("#btn-enviar").html("Enviando, porfavor espere...")
        let url = "{{ route('publicacion/enviar-evaluadores-varias') }}"
        var _token = ""
        $("[name='_token']").each(function() { _token = this.value })
        let request = {
            '_token' : _token,
            'lista' : listaPublicaciones
        }
        $.post(url, request, (response) => {
            $("#btn-enviar").html("Enviar a evaluadores los seleccionados")
            if(response.error == false){
                alerta("Exito", response.mensaje)
                location.reload()
            }else{
                alerta("Error", response.mensaje)
            }
        })
        .fail((error) => {
            $("#btn-enviar").html("Enviar a evaluadores los seleccionados")
            alerta("Error", "Ocurrio un error al enviar las publicaciones, intentalo mas tarde")
        })
    }
  }

  function filtrar() {
    let estado = $("#estado").val()
    var rex = new RegExp(estado, 'i');
    $(`#tabla-publicaciones-docentes tbody tr`).hide();
    $(`#tabla-publicaciones-docentes tbody tr`).filter(function() {
        return rex.test($(this).text());
    }).show();
  }

  function validarEnvio(){
    let checks = $(".check-publicaciones-docentes")
    let listaPublicaciones = []
    for (let i = 0; i < checks.length; i++) {
        let check = checks[i]
        let idPublicacion = check.id.split("_")[1]
        if($("#"+check.id).prop("checked")) listaPublicaciones.push(idPublicacion)
    }
    if(listaPublicaciones.length == 0){
      $("#btn-enviar").fadeOut()
    }else{
      $("#btn-enviar").fadeIn()
    }
  }
</script>
@endsection