@extends('layout.principal')
@section('content')
@csrf
<div class="card-header pb-0">
  <h6>Publicaciones docentes</h6>
</div>
<div class="row">
  <div class="col-9">
  </div>
  <div class="col-3 btn-end">
    <input type="text" class="form-control" placeholder="Buscar..." id="filtro-publicaciones-por-revisar-evaluadores">
  </div>
</div>
<div class="card-body px-0 pt-0 pb-2 mt-3">
  <div class="table-responsive p-0">
    <table class="table align-items-center mb-0" id="tabla-publicaciones-por-revisar-evaluadores">
      <thead>
        <tr>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Autor</th>
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
            <td class="text-center">{{ $publicacion->tercero->nombreCompleto() }}</td>
            <td class="text-center">{{ $publicacion->titulo_obra }}</td>
            <td class="text-center">{{ $publicacion->tipo_obra }}</td>
            <td class="text-center">{{ date('Y-m-d H:i', strtotime($publicacion->created_at)) }}</td>
            <td class="text-center">
              @if($publicacion->estado == "APROBADA - EN REVISION POR EVALUADORES") 
                  <span class="badge badge-sm bg-gradient-info color-black">PENDIENTE DE REVISION</span>
              @endif
              @if($publicacion->estado == "APROBADA") 
                  <span class="badge badge-sm bg-gradient-success color-black">APROBADA</span>
              @endif
              @if($publicacion->estado == "RECHAZADA POR EVALUADORES") 
                  <span class="badge badge-sm bg-gradient-danger color-black">RECHAZADA</span>
              @endif
            </td>
            <td class="text-center">
              <a title="Ver detalle" class="btn bg-gradient-dark mb-0" href="{{ route('publicacion/detalle', $publicacion->id) }}">
                <i class="fas fa-eye icon-action" aria-hidden="true"></i>
              </a>  
              @if($publicacion->estado == "APROBADA - EN REVISION POR EVALUADORES")
                <a title="Calificar" class="btn bg-gradient-dark mb-0" href="{{ route('publicacion/calificar', $publicacion->id) }}">
                    <i class="fas fa-list icon-action" aria-hidden="true"></i>
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
    setFiltro("filtro-publicaciones-por-revisar-evaluadores", "tabla-publicaciones-por-revisar-evaluadores")
  })
</script>
@endsection