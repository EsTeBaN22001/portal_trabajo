<section class="section-sm container-sm reveal-bottom">
  <?php include_once __DIR__ . '/templates/alerts.php'?>
  <?php if (isset($_GET['alert']) && $_GET['alert'] == 'success'): ?>
    <div class="alert success">
      Se creó la cuenta correctamente
    </div>
  <?php endif?>
  <div class="login-form-container">
    <form method="POST" action="" class="form">
      <h1>Iniciar sesión</h1>
      <div class="field-group">
        <input
        autofocus
        type="email"
        name="email"
        title="Correo electrónico"
        id="email"
        placeholder="Ingrese su correo">
        <!-- value="<?=$user->mail?>" -->
      </div>
      <div class="field-group">
        <input
        type="password"
        name="contraseña"
        title="Contraseña"
        id="contraseña"
        placeholder="Ingrese su contraseña">
      </div>
      <div class="field-group">
        <input
        class="button-submit"
        type="submit"
        value="INICIAR SESIÓN">
      </div>
    </form>
  </div>
</section>