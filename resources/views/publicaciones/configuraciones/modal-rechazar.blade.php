<div class="modal fade" tabindex="-10" id="modal-rechazo">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Rechazo de publicación</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i></button>
        </div>
        <div class="modal-body">
            <div class="row mt-0">
                <div class="col-12 col-sm-12 mt-2">
                    <div class="form-group text-center">
                        <label>Por favor indique las causas para el rechazo de la publicación de la obra.</label>
                        <textarea id="rechazo-causas" class="form-control" rows="3"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btn-cerrar-modal-Colaborador">Cerrar</button>
            <button type="button" id="btn-reportar-rechazo" class="btn btn-danger" onclick="rechazarPublicacion()">Reportar rechazo</button>
        </div>
        </div>
    </div>
</div>

<script>
    function rechazarPublicacion() {
        let causas = $("#rechazo-causas").val()
        if(causas == ""){
            alerta("Error", "Las causas del rechazo son obligatorias")
            return false
        }
        let confirmacion = confirm("¿Seguro que desea rechazar la publicación y notificar al docente las razones?")
        if(confirmacion){
            let url = "{{ route('publicacion/rechazar') }}"
            var _token = ""
            $("[name='_token']").each(function() { _token = this.value })
            let request = {
                '_token' : _token,
                'id' : "{{ $data->publicacion->id }}",
                'causas': causas
            }
            $("#btn-reportar-rechazo").html("Reportando, por favor espere...")
            $.post(url, request, (response) => {
                $("#btn-reportar-rechazo").html("Reportar rechazo")
                if(response.error == false){
                    alerta("Exito", response.mensaje)
                    location.reload()
                }else{
                    alerta("Error", response.mensaje)
                }
            })
            .fail((error) => {
                $("#btn-reportar-rechazo").html("Reportar rechazo")
                alerta("Error", "Ocurrio un error al rechazar la publicación, intentalo mas tarde")
            })
        }
    }
</script>