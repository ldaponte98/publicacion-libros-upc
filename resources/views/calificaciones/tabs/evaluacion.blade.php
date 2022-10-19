<p class="mb-0 text-sm">CALIFICACIÓN.</p>
<small>Valore de 1 a 10 (10 la calificación más alta) las siguientes características en relación con la obra.</small>
<div class="multisteps-form__content">
    <div class="row mt-4">
        <div class="col-8 col-sm-5">
            <label>¿El producto brinda aportes en cuanto a aplicaciones, propuestas metodológicas, enfoque, y conceptualización?</label>
        </div>
        <div class="col-4 col-sm-2">
            <select name="brinda_aportes" class="form-control" required @if($data->readonly == true) disabled @endif>
                @for ($i = 10; $i >= 1; $i--)
                    <option @if($data->calificacion->brinda_aportes == $i) selected @endif value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-8 col-sm-5">
            <label>Califique la unidad conceptual y argumentativa del producto (especifique en el comentario si hay
                partes o capítulos prescindibles y por qué).</label>
        </div>
        <div class="col-4 col-sm-2">
            <select name="unidad_conceptual" class="form-control" required @if($data->readonly == true) disabled @endif>
                @for ($i = 10; $i >= 1; $i--)
                    <option @if($data->calificacion->unidad_conceptual == $i) selected @endif value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-8 col-sm-5">
            <label>Califique en qué medida los objetivos planteados por el autor se cumplen cabalmente, es decir, si
                hay armonía entre los objetivos propuestos y los resultados obtenidos.</label>
        </div>
        <div class="col-4 col-sm-2">
            <select name="medida_objetivos" class="form-control" required @if($data->readonly == true) disabled @endif>
                @for ($i = 10; $i >= 1; $i--)
                    <option @if($data->calificacion->medida_objetivos == $i) selected @endif value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-8 col-sm-5">
            <label>Califique la solidez y actualidades de las reflexiones, ideas y /o información presentadas en la
                publicación.</label>
        </div>
        <div class="col-4 col-sm-2">
            <select name="solidez" class="form-control" required @if($data->readonly == true) disabled @endif>
                @for ($i = 10; $i >= 1; $i--)
                    <option @if($data->calificacion->solidez == $i) selected @endif value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-8 col-sm-5">
            <label>Califique la adecuación del producto al rigor metodológico, científico o investigativo.</label>
        </div>
        <div class="col-4 col-sm-2">
            <select name="adecuacion_producto" class="form-control" required @if($data->readonly == true) disabled @endif>
                @for ($i = 10; $i >= 1; $i--)
                    <option @if($data->calificacion->adecuacion_producto == $i) selected @endif value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-8 col-sm-5">
            <label>Califique el aporte y pertinencia del tema, y el enfoque al desarrollo de conocimiento al que hace
                referencia.</label>
        </div>
        <div class="col-4 col-sm-2">
            <select name="aporte_pertenencia" class="form-control" required @if($data->readonly == true) disabled @endif>
                @for ($i = 10; $i >= 1; $i--)
                    <option @if($data->calificacion->aporte_pertenencia == $i) selected @endif value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>
    </div>
</div>

<script> 
    function validacionesTab4() {
    }
</script>