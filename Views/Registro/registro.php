<?php getHeader($data); ?>
<div class="reg-box">
  <a id="cambio-registro" href="#">Registrate como mensajería</a>
  <form class="general-form needs-validation" id="form-registro" name="form-registro" novalidate>
    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="input-name" name="input-name" placeholder="nombre" required>
      <label for="input-name" class="form-label">Nombre</label>
      <div class="invalid-feedback" id="feedback-nombre"></div>
    </div>
    <div class="form-floating mb-3">
      <input type="email" class="form-control" id="input-email" name="input-email" placeholder="correo@ejemplo.com" required>
      <label for="input-email" class="form-label">Correo electrónico</label>
      <div class="invalid-feedback" id="feedback-email"></div>
    </div>
    <div class="form-floating mb-4">
      <input type="password" class="form-control" id="input-pass" name="input-pass" placeholder="contraseña" required>
      <label for="input-pass" class="form-label">Contraseña</label>
      <div class="invalid-feedback" id="feedback-pass"></div>
    </div>
    <div class="mb-4 form-check">
      <input type="checkbox" class="form-check-input" id="captcha" name="captcha" value="checked" required>
      <label class="form-check-label" for="captcha">He leído y acepto los términos y condiciones</label>
      <div class="invalid-feedback" id="feedback-captcha"></div>
    </div>
    <button type="submit" class="btn btn-primary">Registrar</button>
  </form>
</div>
<?php getFooter($data); ?>
