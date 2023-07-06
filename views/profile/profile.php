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

<div class="container-sm section-sm">
  <?php if (isset($_GET['at']) && isset($_GET['am']) ): ?>
    <div class="alert <?= $_GET['at'] ?>">
      <?= $_GET['am'] ?>
    </div>
  <?php endif?>
</div>

<div class="container-sm section-sm profile-content">
  <form  method="POST" class="form bx-shadow user-info">
    <div class="field-group">
      <input 
      type="text" 
      name="userInfo[name]" 
      id="name" 
      placeholder="Nombre"
      value="<?= $user->name ?? '' ?>"
      >
    </div>

    <?php if(!$_SESSION['business']): ?>

      <div class="field-group">
        <input 
        type="text" 
        name="userInfo[surname]" 
        id="surname" 
        placeholder="Apellido"
        value="<?= $user->surname ?? '' ?>"
        >
      </div>

      <div class="field-group">
        <input 
        type="text" 
        name="userInfo[domicile]" 
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
          <input type="date" name="userInfo[date]" id="date" value="<?= $user->date ?? '' ?>" placeholder="Fecha de nacimiento">
        </div>
      </div>

    <?php endif; ?>

    <div class="field-group">
      <input 
      type="email" 
      name="userInfo[email]" 
      id="email" 
      placeholder="Ingrese su correo"
      value="<?= $user->email ?? '' ?>"
      >
    </div>
    <div class="field-group">
      <input 
      type="tel" 
      name="userInfo[phone]"
      id="phone" 
      placeholder="Ingrese su telefono"
      value="<?= $user->phone ?? '' ?>"
      >
    </div>

    <div class="field-group">
      <input class="button-submit" type="submit" value="GUARDAR CAMBIOS">
    </div>
  </form>

  <?php if(!$_SESSION['business']): ?>

    <div class="user-skills">

      <div class="skills-list-container bx-shadow section-card-styles">
        <form name="skillsForm" method="POST" class="form add-skills-container">
          <h2>Habilidades</h2>
          <div class="skills">

            <?php foreach($skills as $skill): ?>
              <div class="skill"><p><?= $skill->title ?></p></div>
              <input class="skill-input-hidden" type="hidden" name="skills[]" value="<?= $skill->id ?>">
            <?php endforeach ?>

          </div>
          <div class="field-group required-skills">
            <h2>Agregar habilidades</h2>

            <select class="select-skills">

              <option value="" selected disabled>Selecciona las habilidades</option>
            
              <?php foreach ($allSkills as $skill): ?>
              
                <option value="<?= $skill->id ?>"><?= $skill->title ?></option>

              <?php endforeach; ?>

            </select>
          </div>

          <div class="field-group">
            <input
            class="button-submit"
            type="submit"
            value="GUARDAR">
          </div>
        </form>
      </div>
    </div>

  <?php endif; ?>


</div>



<script>
  // Espera 3 segundos y luego oculta la alerta
  setTimeout(function() {
    const alert = document.querySelector('.alert');
    alert ? alert.remove() : null
  }, 5000); // 3000 milisegundos = 3 segundos
</script>

<?php 

if(!$_SESSION['business']){
  $script = '
  <script src="/build/js/skillsTagCrudFunctions.js"></script>
  <script src="/build/js/addSkillsWorkerProfile.js"></script>
  ';
}


?>
