@extends('layout.principal')
@section('content')
@csrf
<div class="card-header pb-0">
  <h6>Variables del sistema</h6>
</div>
<div class="row">
    <div class="col-9"></div>
  <div class="col-3">
    <input type="text" class="form-control" placeholder="Buscar..." id="filtro-variables">
  </div>
</div>
<div class="card-body px-0 pt-0 pb-2 mt-3">
  <div class="table-responsive p-0">
    <table class="table align-items-center mb-0" id="tabla-variables">
      <thead>
        <tr>
          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Variable</th>
          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($variables as $variable)
          <tr>
            <td class="text-center">{{ $variable->id }}</td>
            <td class="text-center">{{ $variable->nombre }}</td>
            <td class="text-center">
                <a class="btn bg-gradient-dark mb-0" href="{{ route('dominio/ver', $variable->id) }}">
                    <i class="fas fa-eye icon-action" aria-hidden="true"></i>
                </a>
                <a class="btn bg-gradient-dark mb-0" href="{{ route('dominio/editar', $variable->id) }}">
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
    setFiltro("filtro-variables", "tabla-variables")
  })
  
</script>
@endsection