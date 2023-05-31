@extends('layout.principal')
@section('content')
<style>
    .tabs{ display: none; }
    .oculto { display: none; }
    .error{ color: red; }
    .alert-danger{ color: white;  }
    .color-black{ color: black;  }
</style>
<form id="form-dominio" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-sm-6">
            <h5 class="font-weight-bolder mb-0">Gestion de variable</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label>Codigo</label>
                <input @if($readonly == true) disabled @endif type="text" id="codigo" name="codigo" class="form-control" value="{{$dominio->codigo}}" required>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label>Nombre</label>
                <input @if($readonly == true) disabled @endif type="text" id="nombre" name="nombre" class="form-control" value="{{$dominio->nombre}}" required>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label>Estado</label>
                <select @if($readonly == true) disabled @endif id="estado" name="estado" class="form-control select2" required>
                    <option @if($dominio->estado == 1 || $dominio->estado == null) selected @endif value="1">Activo</option>
                    <option @if($dominio->estado == 0) selected @endif value="0">Inactivo</option>
                </select>
            </div>
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
        if($("#nombre").val() == "" || $("#nombre").val() == null){
            alerta("Error", "El campo [Nombre] es obligatorio", "error")
            return;
        }
        if($("#estado").val() == "" || $("#estado").val() == null){
            alerta("Error", "El campo [Estado] es obligatorio", "error")
            return;
        }
        $("#form-dominio").submit();

    }
</script>
@endsection
