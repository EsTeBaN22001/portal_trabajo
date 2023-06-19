<div class="container-sm section-sm section-card-styles bx-shadow profile-header">
  <div class="profile-container">
    <div class="img-container">
      <i class="fa-solid fa-user"></i>
    </div>
    <div class="text-container">
      <p class="username"><?php echo ($_SESSION['name'] ?? '') . ' ' . ($_SESSION['surname'] ?? '') ?></p>
      <a class="link-change-password" href="<?= $_ENV['HOST'] ?>/change-password">Cambiar contraseña</a>
    </div>
  </div>
  <div class="logout-container">
    <a href="<?= $_ENV['HOST'] ?>/logout">
      <i class="fa-solid fa-arrow-right-from-bracket"></i>
    </a>
  </div>
</div>

<section class="section-sm container-sm reveal-bottom">
  <?php include_once __DIR__ . '/../templates/alerts.php'?>
  <form method="POST" class="form container-sm section-sm section-styles-container bx-shadow">
    <h1>Cambiar contraseña</h1>
    <div class="field-group">
      <input
      autofocus
      type="password"
      name="password"
      title="Contraseña actual"
      id="password"
      placeholder="Contraseña actual">
    </div>
    <div class="field-group">
      <input
      type="password"
      name="newPassword"
      title="Contraseña nueva"
      id="newPassword"
      placeholder="Contraseña nueva">
    </div>
    <div class="field-group">
      <input
      class="button-submit"
      type="submit"
      value="Guardar contraseña">
    </div>
  </form>
</section>