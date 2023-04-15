<section class="section-sm container-sm reveal-bottom">
  <?php include_once(__DIR__ . '/templates/alerts.php') ?>
  <div class="login-form-container">
    <form method="POST" action="" class="form">
      <h1>Registrate</h1>
      <div class="field-group-container field-group-container-radio">
        <div class="field-group radio-group">
          <input type="radio" name="type" value="alumno" id="alumno">
          <label for="alumno">Alumno</label>
        </div>
        <div class="field-group radio-group">
          <input type="radio" name="type" value="empresa" id="empresa">
          <label for="empresa">Empresa</label>
        </div>
      </div>
      <div class="field-group">
        <input 
        type="text" 
        name="nombre" 
        id="nombre" 
        placeholder="Nombre"
        <?php if(!empty($alumno->nombre)): ?>
          value="<?= $alumno->nombre ?>"
        <?php endif ?>
        <?php if(!empty($empresa->nombre)): ?>
          value="<?= $empresa->nombre ?>"
        <?php endif ?>
        >
      </div>
      <div class="field-group alumno-input">
        <input 
        type="text" 
        name="apellido" 
        id="apellido" 
        placeholder="Apellido"
        value="<?= $alumno->apellido ?? '' ?>"
        >
      </div>
      <div class="field-group alumno-input">
        <input 
        type="text" 
        name="domicilio" 
        id="domicilio" 
        placeholder="Domicilio"
        <?php if(!empty($alumno->domicilio)): ?>
          value="<?= $alumno->domicilio ?>"
        <?php endif ?>
        <?php if(!empty($empresa->domicilio)): ?>
          value="<?= $empresa->domicilio ?>"
        <?php endif ?>
        >
      </div>
      <div class="field-group">
        <input 
        type="email" 
        name="email" 
        id="email" 
        placeholder="Ingrese su correo"
        <?php if(!empty($alumno->email)): ?>
          value="<?= $alumno->email ?>"
        <?php endif ?>
        <?php if(!empty($empresa->email)): ?>
          value="<?= $empresa->email ?>"
        <?php endif ?>
        >
      </div>
      <div class="field-group">
        <input 
        type="tel" 
        name="telefono"
        id="telefono" 
        placeholder="Ingrese su telefono"
        <?php if(!empty($alumno->telefono)): ?>
          value="<?= $alumno->telefono ?>"
        <?php endif ?>
        <?php if(!empty($empresa->telefono)): ?>
          value="<?= $empresa->telefono ?>"
        <?php endif ?>
        >
      </div>
      <div class="field-group-container alumno-input">
        <div class="field-group alumno-input">
          <label for="fecha_nacimiento">Fecha de nacimiento:</label>
        </div>
        <div class="field-group alumno-input">
          <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" placeholder="Fecha de nacimiento">
        </div>
      </div>
      <div class="field-group">
        <input 
        type="password" 
        name="contraseña" 
        id="contraseña" 
        placeholder="Contraseña"
        >
      </div>
      <div class="field-group">
        <input 
        type="password" 
        name="confirmarContraseña" 
        id="confirmarContraseña" 
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

<script src="/build/js/verificarTipoRegistroForm.js"></script>

';

?>
