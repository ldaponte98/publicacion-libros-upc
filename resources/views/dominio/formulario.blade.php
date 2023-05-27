@extends('layout.principal')
@section('content')
<style>
    .tabs{ display: none; }
    .oculto { display: none; }
    .error{ color: red; }
    .alert-danger{ color: white;  }
    .color-black{ color: black;  }
</style>
<form id="form-variables" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-sm-12">
            <h5 class="font-weight-bolder mb-0">Gestion de variables del sistema - <b>{{ $padre->nombre }}</b></h5>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            
        </div>
    </div>
    @if($readonly != true)
    <div class="row">
        <div class="col-sm-12 pull-right">
            <button onclick="validar()" type="button" class="btn bg-gradient-dark mb-0 pull-right">Guardar cambios</button>
        </div>
    </div>
    @endif
</form>
<script>
    function validar() {
        
        $("#form-variables").submit();

    }
</script>
@endsection
