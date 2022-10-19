<p class="mb-0 text-sm">INFORMACION COMPLEMENTARIA.</p>
<div class="multisteps-form__content">
    <div class="row mt-4">
        <div class="col-8 col-sm-5">
            <label>¿La obra ya fue publicada por la editorial Ediciones Unicesar?</label>
        </div>
        <div class="col-4 col-sm-2">
            <select  name="obra_publicada_unicesar" class="form-control" required @if($data->readonly == true) disabled @endif>
                <option @if($data->publicacion->obra_publicada_unicesar == "Si") selected @endif value="Si">Si</option>
                <option @if($data->publicacion->obra_publicada_unicesar == "No") selected @endif value="No">No</option>
            </select>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-8 col-sm-5">
            <label>¿La obra ya fue publicada por otra editorial?</label>
        </div>
        <div class="col-4 col-sm-2">
            <select  name="obra_publicada_otra_editorial" class="form-control" required @if($data->readonly == true) disabled @endif>
                <option @if($data->publicacion->obra_publicada_otra_editorial == "Si") selected @endif value="Si">Si</option>
                <option @if($data->publicacion->obra_publicada_otra_editorial == "No") selected @endif value="No">No</option>
            </select>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-8 col-sm-5">
            <label>¿La obra ya fue publicada por la editorial Ediciones Unicesar y se está solicitando la publicación de una nueva edición?</label>
        </div>
        <div class="col-4 col-sm-2">
            <select  name="obra_publicada_unicesar_solicitud_nueva_edicion" class="form-control" required @if($data->readonly == true) disabled @endif>
                <option @if($data->publicacion->obra_publicada_unicesar_solicitud_nueva_edicion == "Si") selected @endif value="Si">Si</option>
                <option @if($data->publicacion->obra_publicada_unicesar_solicitud_nueva_edicion == "No") selected @endif value="No">No</option>
            </select>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-8 col-sm-5">
            <label>¿La obra ya fue publicada por otra editorial y se está solicitando la publicación de una nueva edición por la editorial Ediciones Unicesar?</label>
        </div>
        <div class="col-4 col-sm-2">
            <select  name="obra_publicada_unicesar_nueva_edicion_editorial_unicesar" class="form-control" required @if($data->readonly == true) disabled @endif>
                <option @if($data->publicacion->obra_publicada_unicesar_nueva_edicion_editorial_unicesar == "Si") selected @endif value="Si">Si</option>
                <option @if($data->publicacion->obra_publicada_unicesar_nueva_edicion_editorial_unicesar == "No") selected @endif value="No">No</option>
            </select>
        </div>
    </div>


    <div class="row mt-4">
        <div class="col-8 col-sm-5">
            <label>¿La obra ya fue publicada por la editorial Ediciones Unicesar y se está solicitando la publicación en un formato diferente al publicado inicialmente?</label>
        </div>
        <div class="col-4 col-sm-2">
            <select  name="obra_publicada_unicesar_formato_diferente" class="form-control" required @if($data->readonly == true) disabled @endif>
                <option @if($data->publicacion->obra_publicada_unicesar_formato_diferente == "Si") selected @endif value="Si" value="Si">Si</option>
                <option @if($data->publicacion->obra_publicada_unicesar_formato_diferente == "No") selected @endif value="No" value="No">No</option>
            </select>
        </div>
    </div>
</div>

<script> 
    function validacionesTab6() {
    }
</script>