<p class="mb-0 text-sm">CALIFICACIÓN.</p>
<small>Según el carácter del producto, indique con una X las preguntas que considere pertinentes.</small>
<div class="multisteps-form__content">
    <div class="row mt-4">
        <div class="col-8 col-sm-5">
            <label>¿Es adecuado el título del producto? (al final en comentarios puede explicitar su respuesta)</label>
        </div>
        <div class="col-4 col-sm-2">
            <select name="adecuado_titulo" class="form-control" required @if($data->readonly == true) disabled @endif>
                <option @if($data->calificacion->adecuado_titulo == "Si") selected @endif value="Si" value="Si">Si</option>
                <option @if($data->calificacion->adecuado_titulo == "No") selected @endif value="No" value="No">No</option>
            </select>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-8 col-sm-5">
            <label>¿Es justificada la inclusión de todas sus imágenes (tablas, ilustraciones, fotos, etc.) y es apropiada
                su calidad? (si no es así, en los comentarios especifique cuáles).</label>
        </div>
        <div class="col-4 col-sm-2">
            <select name="justificada_inclusion" class="form-control" required @if($data->readonly == true) disabled @endif>
                <option @if($data->calificacion->justificada_inclusion == "Si") selected @endif value="Si" value="Si">Si</option>
                <option @if($data->calificacion->justificada_inclusion == "No") selected @endif value="No" value="No">No</option>
            </select>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-8 col-sm-5">
            <label>¿Su estilo concuerda con el tema tratado y con el objeto del producto (léxico, giros o modos de
                expresión y claridad conceptual)?</label>
        </div>
        <div class="col-4 col-sm-2">
            <select name="estilo_concuerda" class="form-control" required @if($data->readonly == true) disabled @endif>
                <option @if($data->calificacion->estilo_concuerda == "Si") selected @endif value="Si" value="Si">Si</option>
                <option @if($data->calificacion->estilo_concuerda == "No") selected @endif value="No" value="No">No</option>
            </select>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-8 col-sm-5">
            <label>¿Su ortografía y redacción (normas básicas del español) son apropiadas? (en caso contrario, favor
                indicar los capítulos o párrafos para hacerle énfasis al corrector de estilo que revisará el
                documento).</label>
        </div>
        <div class="col-4 col-sm-2">
            <select name="ortografia_redaccion" class="form-control" required @if($data->readonly == true) disabled @endif>
                <option @if($data->calificacion->ortografia_redaccion == "Si") selected @endif value="Si" value="Si">Si</option>
                <option @if($data->calificacion->ortografia_redaccion == "No") selected @endif value="No" value="No">No</option>
            </select>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-8 col-sm-5">
            <label>¿El producto reúne condiciones para ser parte de la bibliografía más reconocida sobre el tema?</label>
        </div>
        <div class="col-4 col-sm-2">
            <select name="producto_fuentes_pertinentes" class="form-control" required @if($data->readonly == true) disabled @endif>
                <option @if($data->calificacion->producto_fuentes_pertinentes == "Si") selected @endif value="Si" value="Si">Si</option>
                <option @if($data->calificacion->producto_fuentes_pertinentes == "No") selected @endif value="No" value="No">No</option>
            </select>
        </div>
    </div>
</div>
<hr class="horizontal dark mt-4">
<small>Manejo de fuentes de información.</small>
<div class="multisteps-form__content">
    <div class="row mt-4">
        <div class="col-8 col-sm-5">
            <label>¿Evidencia exactitud, pertinencia, actualidad y fiabilidad de las referencias bibliográficas? (si es
                necesario, especifique en el comentario qué referencias no cumplen dichas características según las
                normas pertinentes).</label>
        </div>
        <div class="col-4 col-sm-2">
            <select name="evidencia_exactitud" class="form-control" required @if($data->readonly == true) disabled @endif>
                <option @if($data->calificacion->evidencia_exactitud == "Si") selected @endif value="Si" value="Si">Si</option>
                <option @if($data->calificacion->evidencia_exactitud == "No") selected @endif value="No" value="No">No</option>
            </select>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-8 col-sm-5">
            <label>¿Es posible distinguir los aportes del autor, frente a la información proveniente de otras fuentes y
                autores?</label>
        </div>
        <div class="col-4 col-sm-2">
            <select name="distinguir_aportes_autor" class="form-control" required @if($data->readonly == true) disabled @endif>
                <option @if($data->calificacion->distinguir_aportes_autor == "Si") selected @endif value="Si" value="Si">Si</option>
                <option @if($data->calificacion->distinguir_aportes_autor == "No") selected @endif value="No" value="No">No</option>
            </select>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-8 col-sm-5">
            <label>¿El autor usa adecuadamente los procedimientos de presentación del producto: citas, paráfrasis, notas,
                referencias, bibliografía, según las normas de uso internacional para incorporar al texto información
                proveniente de las fuentes?</label>
        </div>
        <div class="col-4 col-sm-2">
            <select name="uso_adecuado_procedimientos" class="form-control" required @if($data->readonly == true) disabled @endif>
                <option @if($data->calificacion->uso_adecuado_procedimientos == "Si") selected @endif value="Si" value="Si">Si</option>
                <option @if($data->calificacion->uso_adecuado_procedimientos == "No") selected @endif value="No" value="No">No</option>
            </select>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-8 col-sm-5">
            <label>¿El autor usa las fuentes más pertinentes y relevantes en el área del saber en la que se inscribe el
                producto?</label>
        </div>
        <div class="col-4 col-sm-2">
            <select name="fuentes_pertinentes" class="form-control" required @if($data->readonly == true) disabled @endif>
                <option @if($data->calificacion->fuentes_pertinentes == "Si") selected @endif value="Si" value="Si">Si</option>
                <option @if($data->calificacion->fuentes_pertinentes == "No") selected @endif value="No" value="No">No</option>
            </select>
        </div>
    </div>
</div>



<script> 
    function validacionesTab5() {
    }
</script>