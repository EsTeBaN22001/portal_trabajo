<section class="section-sm container-sm reveal-bottom">
  <?php include_once(__DIR__ . '/templates/alerts.php') ?>
  <div class="login-form-container">
    <form method="POST" action="" class="form">
      <h1>Registrate</h1>
      <div class="field-group-container field-group-container-radio">
        <div class="field-group radio-group">
          <input type="radio" name="type" value="worker" id="worker">
          <label for="worker">Trabajador</label>
        </div>
        <div class="field-group radio-group">
          <input type="radio" name="type" value="business" id="business">
          <label for="business">Empresa</label>
        </div>
      </div>
      <div class="field-group">
        <input 
        type="text" 
        name="name" 
        id="name" 
        placeholder="Nombre"
        <?php if(!empty($worker->name)): ?>
          value="<?= $worker->name ?>"
        <?php endif ?>
        <?php if(!empty($business->name)): ?>
          value="<?= $business->name ?>"
        <?php endif ?>
        >
      </div>
      <div class="field-group worker-input">
        <input 
        type="text" 
        name="surname" 
        id="surname" 
        placeholder="Apellido"
        value="<?= $worker->surname ?? '' ?>"
        >
      </div>
      <div class="field-group worker-input">
        <input 
        type="text" 
        name="domicile" 
        id="domicile" 
        placeholder="Domicilio"
        <?php if(!empty($worker->domicile)): ?>
          value="<?= $worker->domicile ?>"
        <?php endif ?>
        <?php if(!empty($business->domicile)): ?>
          value="<?= $business->domicile ?>"
        <?php endif ?>
        >
      </div>
      <div class="field-group">
        <input 
        type="email" 
        name="email" 
        id="email" 
        placeholder="Ingrese su correo"
        <?php if(!empty($worker->email)): ?>
          value="<?= $worker->email ?>"
        <?php endif ?>
        <?php if(!empty($business->email)): ?>
          value="<?= $business->email ?>"
        <?php endif ?>
        >
      </div>
      <div class="field-group">
        <input 
        type="tel" 
        name="phone"
        id="phone" 
        placeholder="Ingrese su telefono"
        <?php if(!empty($worker->phoone)): ?>
          value="<?= $worker->phoone ?>"
        <?php endif ?>
        <?php if(!empty($business->phone)): ?>
          value="<?= $business->phone ?>"
        <?php endif ?>
        >
      </div>
      <div class="field-group-container worker-input">
        <div class="field-group worker-input">
          <label for="date">Fecha de nacimiento:</label>
        </div>
        <div class="field-group worker-input">
          <input type="date" name="date" id="date" placeholder="Fecha de nacimiento">
        </div>
      </div>
      <div class="field-group">
        <input 
        type="password" 
        name="password" 
        id="password" 
        placeholder="Contraseña"
        >
      </div>
      <div class="field-group">
        <input 
        type="password" 
        name="confirmPassword" 
        id="confirmPassword" 
        placeholder="Confirmación de contraseña"
        >
      </div>
      <div class="field-group">
        <input class="button-submit" type="submit" value="REGISTRARSE">
      </div>
    </form>
  </div>
</section>

<?php

$script = '

<script src="/build/js/verifyFormTypeRegistration.js"></script>

';

?>
