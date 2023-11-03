<section class="section-sm container-sm header-section-dashboard">
  <h2>Crea un nuevo trabajo</h2>
</section>

<section class="section-sm container-sm">

  <form method="POST" action="" class="form bx-shadow">
    <h1>Complete el formulario</h1>
    <?php include_once __DIR__ . '/../templates/alerts.php'?>
    <div class="field-group">
      <input
      autofocus
      type="text"
      name="title"
      title="Título"
      id="title"
      placeholder="Ingrese el título">
    </div>

    <div class="field-group">
      <textarea 
      name="description" 
      id="description"
      placeholder="Descripción del trabajo"
      ></textarea>
    </div>

    <div class="field-group">
      <input
      type="number"
      name="salary"
      title="Salario"
      id="salary"
      placeholder="Ingresa el salario">
    </div>

    <div class="field-group required-skills">
      <h2>Habilidades requeridas</h2>
      <select class="select-skills">

        <option value="" selected disabled>Selecciona las habilidades requeridas</option>
      
        <?php foreach ($skills as $skill): ?>
        
          <option value="<?= $skill->id ?>"><?= $skill->title ?></option>

        <?php endforeach; ?>

      </select>
      <p class="info-input">Doble click para eliminar</p>
      <div class="skills">
      </div>
    </div>

    <div class="field-group">
      <input
      class="button-submit"
      type="submit"
      value="CREAR TRABAJO">
    </div>
  </form>
  
</section>

<?php 

$script = '

<script src="/build/js/skillsTagCrudFunctions.js"></script>
<script src="build/js/addSkillNewJob.js"></script>

'

?>
