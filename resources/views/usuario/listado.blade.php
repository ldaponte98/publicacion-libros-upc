@extends('layout.principal')
@section('content')
@csrf
<div class="card-header pb-0">
  <h6>Usuarios del sistema</h6>
</div>
<div class="row">
  <div class="col-9">
    <a class="btn bg-gradient-dark mb-0 pull-right" href="{{ route('usuario/crear') }}">
      <i class="fas fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;Nuevo usuario
    </a>
  </div>
  <div class="col-3">
    <input type="text" class="form-control" placeholder="Buscar..." id="filtro-usuarios">
  </div>
</div>
<div class="card-body px-0 pt-0 pb-2 mt-3">
  <div class="table-responsive p-0">
    <table class="table align-items-center mb-0" id="tabla-usuarios">
      <thead>
        <tr>
          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Usuario</th>
          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nombre</th>
          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Perfil</th>
          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Fecha de creación</th>
          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Estado</th>
          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($usuarios as $usuario)
          <tr>
            <td class="text-center">{{ $usuario->id }}</td>
            <td class="text-center">{{ $usuario->usuario }}</td>
            <td class="text-center">{{ $usuario->tercero->identificacion }} - {{ $usuario->tercero->nombreCompleto() }}</td>
            <td class="text-center">{{ $usuario->perfil->nombre }}</td>
            <td class="text-center">{{ date('Y-m-d H:i', strtotime($usuario->created_at)) }}</td>
            <td class="text-center">
              @if($usuario->estado == 0) 
                  <span class="badge badge-sm bg-gradient-danger color-black">Inactivo</span>
              @endif
              @if($usuario->estado == 1) 
                  <span class="badge badge-sm bg-gradient-success color-black">Activo</span>
              @endif
            </td>
            <td class="text-center">
                <a class="btn bg-gradient-dark mb-0" href="{{ route('usuario/ver', $usuario->id) }}">
                    <i class="fas fa-eye icon-action" aria-hidden="true"></i>
                </a>
                <a class="btn bg-gradient-dark mb-0" href="{{ route('usuario/editar', $usuario->id) }}">
                  <i class="fas fa-edit icon-action" aria-hidden="true"></i>
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
    setFiltro("filtro-usuarios", "tabla-usuarios")
  })
</script>
@endsection