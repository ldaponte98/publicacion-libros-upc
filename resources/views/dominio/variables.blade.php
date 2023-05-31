@extends('layout.principal')
@section('content')
    <style>
        .tabs {
            display: none;
        }

        .oculto {
            display: none;
        }

        .error {
            color: red;
        }

        .alert-danger {
            color: white;
        }

        .color-black {
            color: black;
        }
    </style>
    <div class="row">
        <div class="col-sm-12">
            <h5 class="font-weight-bolder mb-0">Gestion de variables del sistema - <b>{{ $padre->nombre }}</b></h5>
        </div>
    </div><br>
    <div class="row">
        <div class="col-9">
            <a class="btn bg-gradient-dark mb-0 pull-right" href="{{ route('dominio/crear', $padre->id) }}">
                <i class="fas fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;Nueva variable
              </a>
        </div>
        <div class="col-3">
            <input type="text" class="form-control" placeholder="Buscar..." id="filtro-hijos">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0" id="tabla-hijos">
                    <thead>
                        <tr>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Codigo</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Variable</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Estado</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hijos as $variable)
                            <tr>
                                <td class="text-center">{{ $variable->id }}</td>
                                <td class="text-center">{{ $variable->codigo }}</td>
                                <td class="text-center">{{ $variable->nombre }}</td>
                                <td class="text-center">
                                    @if($variable->estado == 0) 
                                        <span class="badge badge-sm bg-gradient-danger color-black">Inactivo</span>
                                    @endif
                                    @if($variable->estado == 1) 
                                        <span class="badge badge-sm bg-gradient-success color-black">Activo</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a class="btn bg-gradient-dark mb-0"
                                        href="{{ route('dominio/ver', $variable->id) }}">
                                        <i class="fas fa-eye icon-action" aria-hidden="true"></i>
                                    </a>
                                    <a class="btn bg-gradient-dark mb-0"
                                        href="{{ route('dominio/editar', ['id_padre' => $padre->id, 'id' => $variable->id]) }}">
                                        <i class="fas fa-edit icon-action" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(() => {
            setFiltro("filtro-hijos", "tabla-hijos")
        })
    </script>
@endsection
