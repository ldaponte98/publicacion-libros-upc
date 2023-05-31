@extends('layout.principal')
@section('content')
@csrf
<div class="card-header pb-0">
  <h6>Mis publicaciones</h6>
</div>
<div class="row">
  <div class="col-9">
    <a class="btn bg-gradient-dark mb-0 pull-right" href="{{ route('publicacion/crear') }}">
      <i class="fas fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;Nueva publicación
    </a>
  </div>
  <div class="col-3">
    <input type="text" class="form-control" placeholder="Buscar..." id="filtro-mis-publicaciones">
  </div>
</div>
<div class="card-body px-0 pt-0 pb-2 mt-3">
  <div class="table-responsive p-0">
    <table class="table align-items-center mb-0" id="tabla-mis-publicaciones">
      <thead>
        <tr>
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
              @if($publicacion->estado == "ENVIADA A COMITE EDITORIAL" or 
                  $publicacion->estado == "RECHAZADA POR COMITE EDITORIAL" or 
                  $publicacion->estado == "RECHAZADA POR EVALUADORES")
                <a class="btn bg-gradient-dark mb-0" href="{{ route('publicacion/editar', $publicacion->id) }}">
                  <i class="fas fa-edit icon-action" aria-hidden="true"></i>
                </a>

                <a class="btn bg-gradient-dark mb-0" onclick="anular({{ $publicacion->id }})">
                  <i class="fas fa-ban icon-action" aria-hidden="true"></i>
                </a>
              @endif              
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<script>
  $(document).ready(() => {
    setFiltro("filtro-mis-publicaciones", "tabla-mis-publicaciones")
  })

  function anular(id) {
    let confirmacion = confirm("¿Seguro que desea anular la publicación?")
    if(confirmacion){
        let url = "{{ route('publicacion/anular') }}"
        var _token = ""
        $("[name='_token']").each(function() { _token = this.value })
        let request = {
            '_token' : _token,
            'id' : id
        }
        $.post(url, request, (response) => {
            if(response.error == false){
                alerta("Exito", response.mensaje)
                location.reload()
            }else{
                alerta("Error", response.mensaje)
            }
        })
        .fail((error) => {
            alerta("Error", "Ocurrio un error al anular la publicación, intentalo mas tarde")
        })
    }
  }
</script>
@endsection