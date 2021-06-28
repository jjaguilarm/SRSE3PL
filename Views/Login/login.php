<?php getHeader($data); ?>
<div class="reg-box">
  <h1>Ingresa a tu cuenta</h1>
  <form class="general-form needs-validation" id="form-login" name="form-login" novalidate>
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
    <button type="submit" class="btn btn-primary">Iniciar sesión</button>
  </form>
</div>
<?php getFooter($data); ?>
