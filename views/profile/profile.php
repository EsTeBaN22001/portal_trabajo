<div class="container-sm section-sm section-card-styles bx-shadow profile-header">
  <div class="profile-container">
    <div class="img-container">
      <i class="fa-solid fa-user"></i>
    </div>
    <p class="username"><?php echo ($_SESSION['name'] ?? '') . ' ' . ($_SESSION['surname'] ?? '') ?></p>
  </div>
  <div class="logout-container">
    <a href="<?= $_ENV['HOST'] ?>/logout">
      <i class="fa-solid fa-arrow-right-from-bracket"></i>
    </a>
  </div>
</div>

<form method="POST" action="" class="form container-sm section-sm section-styles-container bx-shadow">
  <div class="field-group">
    <input 
    type="text" 
    name="name" 
    id="name" 
    placeholder="Nombre"
    value="<?= $user->name ?? '' ?>"
    >
  </div>

  <?php if(!$_SESSION['business']): ?>

    <div class="field-group">
      <input 
      type="text" 
      name="surname" 
      id="surname" 
      placeholder="Apellido"
      value="<?= $user->surname ?? '' ?>"
      >
    </div>

    <div class="field-group">
      <input 
      type="text" 
      name="domicile" 
      id="domicile" 
      placeholder="Domicilio"
      value="<?= $user->domicile ?? '' ?>"
      >
    </div>

    <div class="field-group-container">
      <div class="field-group">
        <label for="date">Fecha de nacimiento:</label>
      </div>
      <div class="field-group">
        <input type="date" name="date" id="date" value="<?= $user->date ?? '' ?>" placeholder="Fecha de nacimiento">
      </div>
    </div>

  <?php endif; ?>

  <div class="field-group">
    <input 
    type="email" 
    name="email" 
    id="email" 
    placeholder="Ingrese su correo"
    value="<?= $user->email ?? '' ?>"
    >
  </div>
  <div class="field-group">
    <input 
    type="tel" 
    name="phone"
    id="phone" 
    placeholder="Ingrese su telefono"
    value="<?= $user->phone ?? '' ?>"
    >
  </div>

  <div class="field-group">
    <input class="button-submit" type="submit" value="GUARDAR CAMBIOS">
  </div>
</form>