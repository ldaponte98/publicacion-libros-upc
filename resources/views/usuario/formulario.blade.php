@extends('layout.principal')
@section('content')
<style>
    .tabs{ display: none; }
    .oculto { display: none; }
    .error{ color: red; }
    .alert-danger{ color: white;  }
    .color-black{ color: black;  }
</style>
<form id="form-usuarios" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-sm-6">
            <h5 class="font-weight-bolder mb-0">Gestion de usuario</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label>Identificación</label>
                <input @if($readonly == true) disabled @endif type="text" id="tercero_identificacion" name="tercero_identificacion" class="form-control" value="{{$usuario->tercero->identificacion}}" required>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label>Nombres</label>
                <input @if($readonly == true) disabled @endif type="text" id="tercero_nombres" name="tercero_nombres" class="form-control" value="{{$usuario->tercero->nombres}}" required>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label>Apellidos</label>
                <input @if($readonly == true) disabled @endif type="text" id="tercero_apellidos" name="tercero_apellidos" class="form-control" value="{{$usuario->tercero->apellidos}}" required>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label>Email</label>
                <input @if($readonly == true) disabled @endif type="text" id="tercero_email" name="tercero_email" class="form-control" value="{{$usuario->tercero->email}}" required>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label>Perfil</label>
                <select @if($readonly == true) disabled @endif id="perfil_id" name="perfil_id" class="form-control select2" required>
                    @php 
                        $perfiles = \App\Models\Perfil::all();
                    @endphp
                    @foreach ($perfiles as $perfil)
                        <option @if($usuario->perfil_id == $perfil->id) selected @endif value="{{ $perfil->id }}">{{ $perfil->nombre }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label>Estado</label>
                <select @if($readonly == true) disabled @endif id="estado" name="estado" class="form-control select2" required>
                    <option @if($usuario->estado == 1 || $usuario->estado == null) selected @endif value="1">Activo</option>
                    <option @if($usuario->estado == 0) selected @endif value="0">Inactivo</option>
                </select>
            </div>
        </div>
        <div class="col-sm-12">
            <h5><b>Datos de acceso</b></h5>
            <hr>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label>Nombre de usuario</label>
                <input @if($readonly == true) disabled @endif type="text" id="usuario" name="usuario" class="form-control" value="{{$usuario->usuario}}" required>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label>Contraseña</label>
                <input @if($readonly == true) disabled @endif type="password" id="clave" name="clave" class="form-control" value="{{$usuario->clave}}" required>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label>Confirmación contraseña</label>
                <input @if($readonly == true) disabled @endif type="password" id="confirmacion_clave" class="form-control" value="{{$usuario->clave}}" required>
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
        let clave = $("#clave").val()
        let confirmacion = $("#confirmacion_clave").val()
        if($("#tercero_identificacion").val() == "" || $("#tercero_identificacion").val() == null){
            alerta("Error", "El campo [Identificación] es obligatorio", "error")
            return;
        }
        if($("#tercero_nombres").val() == "" || $("#tercero_nombres").val() == null){
            alerta("Error", "El campo [Nombres] es obligatorio", "error")
            return;
        }
        if($("#tercero_apellidos").val() == "" || $("#tercero_apellidos").val() == null){
            alerta("Error", "El campo [Apellidos] es obligatorio", "error")
            return;
        }
        if($("#tercero_email").val() == "" || $("#tercero_email").val() == null){
            alerta("Error", "El campo [Email] es obligatorio", "error")
            return;
        }
        if($("#perfil_id").val() == "" || $("#perfil_id").val() == null){
            alerta("Error", "El campo [Perfil] es obligatorio", "error")
            return;
        }
        if($("#estado").val() == "" || $("#estado").val() == null){
            alerta("Error", "El campo [Estado] es obligatorio", "error")
            return;
        }
        if($("#usuario").val() == "" || $("#usuario").val() == null){
            alerta("Error", "El campo [Nombre de usuario] es obligatorio", "error")
            return;
        }
        if($("#clave").val() == "" || $("#clave").val() == null){
            alerta("Error", "El campo [Contraseña] es obligatorio", "error")
            return;
        }
        if(clave != confirmacion){
            alerta("Error", "Las contraseñas no coinciden", "error", "error")
            return;
        }

        $("#form-usuarios").submit();

    }
</script>
@endsection
