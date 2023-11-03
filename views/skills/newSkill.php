<section class="section-sm container-sm header-section-dashboard">
  <h2>Crea nueva habilidad</h2>
</section>

<?php if (isset($_GET['at']) && $_GET['ac']): ?>
  <div class="section-sm container-sm alerts-container">
    <div class="alert <?= $_GET['at'] ?>">
      <?= $_GET['ac'] ?>
    </div>
  </div>
<?php endif?>

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
      <input
      class="button-submit"
      type="submit"
      value="CREAR HABILIDAD">
    </div>
    
  </form>

</section>

<section class="section-sm container-ultra-sm header-section-dashboard bx-shadow">
  <h2 class="separator">Habilidades creadas</h2>
  <div class="skills">
      
    <?php foreach($skills as $skill): ?>
      <div class="skill"><p><?= $skill->title ?></p></div>
    <?php endforeach; ?>
    
  </div>
</section>

<?php 

$script = '



'

?>
