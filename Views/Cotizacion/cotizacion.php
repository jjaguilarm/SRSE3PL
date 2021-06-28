<?php getHeader($data); ?>
<div class="reg-box">
  <h1>Cotiza tu envío</h1>
  <form class="general-form needs-validation" id="form-cotizacion" name="form-cotizacion" novalidate>
    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="input-zip1" name="input-zip1" placeholder="Código postal de origen" required>
      <label class="form-label" for="input-zip1">Código postal de origen</label>
      <div class="invalid-feedback" id="feedback-zip1"></div>
    </div>
    <fieldset class="row mb-3">
      <legend class="col-form-label col-sm-3 pt-0">Tipo de envío:</legend>
      <div class="col-sm-9">
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" id="input-type1" name="input-type" value="local" onclick="activa('input-zip2')">
          <label class="form-check-label" for="input-type1">Envío local</label>
          <div class="invalid-feedback" id="feedback-type"></div>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" id="input-type2" name="input-type" value="internacional" onclick="activa('input-country')">
          <label class="form-check-label" for="input-type2">Envío internacional</label>
        </div>
      </div>
    </fieldset>
    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="input-zip2" name="input-zip2" placeholder="Código postal de destino" required disabled>
      <label class="form-label" for="input-zip2">Código postal de destino</label>
      <div class="invalid-feedback" id="feedback-zip2"></div>
    </div>
    <div class="form-floating mb-3">
      <select class="form-select" id="input-country" name="input-country" required disabled>
        <option value="" selected disabled>Seleccione el país de destino</option>
        <?php
        $paisObj = new Pais();
        foreach ($paisObj->getPaisesAsc() as $pais) {
            echo "<option value='" . $pais['id'] . "'>" . $pais['value'] . "</option>";
        }
        ?>
      </select>
      <label class="form-label" for="input-country">País de destino</label>
      <div class="invalid-feedback" id="feedback-country"></div>
    </div>
    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="input-weight" name="input-weight" placeholder="Peso del envío" required>
      <label class="form-label" for="input-weight">Peso del envío (kg)</label>
      <div class="invalid-feedback" id="feedback-weight"></div>
    </div>
    <fieldset class="row mb-3">
      <legend class="col-form-label col-sm-3 pt-0">Dimensiones:</legend>
      <div class="col-sm-9">
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="input-large" name="input-large" placeholder="Largo" required>
          <label class="form-label" for="input-large">Largo (cm)</label>
          <div class="invalid-feedback" id="feedback-large"></div>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="input-width" name="input-width" placeholder="Ancho" required>
          <label class="form-label" for="input-width">Ancho (cm)</label>
          <div class="invalid-feedback" id="feedback-width"></div>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="input-height" name="input-height" placeholder="Altura" required>
          <label class="form-label" for="input-height">Alto (cm)</label>
          <div class="invalid-feedback" id="feedback-height"></div>
        </div>
      </div>
    </fieldset>
    <button type="submit" class="btn btn-primary">Continuar</button>
  </form>
</div>
<?php getFooter($data); ?>
