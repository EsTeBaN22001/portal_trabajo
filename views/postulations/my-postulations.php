<div class="container-sm section-sm header-section-dashboard">
  <h2>Mis postulaciones</h2>
</div>

<?php if (isset($_GET['at']) && $_GET['am']): ?>
  <div class="section-sm container-sm alerts-container">
    <div class="alert <?= $_GET['at'] ?>">
      <?= $_GET['am'] ?>
    </div>
  </div>
<?php endif?>

<div class="container-sm section-sm postulations-container card-jobs">

  <?php foreach($postulations as $postulation): ?>
    
    <div class="card bx-shadow">
      <div class="card-header">
        <span class="title"><h3><?= $postulation->title ?></h3></span>
        <p class="name-business"><?= $postulation->business ?></p>
      </div>
      <div class="card-body">
        <p class="salary">Salario: <span class="salary-number"><?= $postulation->salary ?></span></p>
        <p class="description"><?= $postulation->description ?></p>
        <div class="required-skills">
          <p class="required-skills-title">Habilidades requeridas</p>
          <div class="skills">
          
            <?php foreach($postulation->skills as $skill): ?>
              <div class="skill"><p><?= $skill ?></p></div>
            <?php endforeach; ?>
            
          </div>
        </div>
      </div>
      <div class="card-footer">
        <p class="date">Fecha de postulación: <span class="date-number"><?= $postulation->postulation_date ?></span></p>
        <a class="delete-postulation" href="<?= $_ENV['HOST'] ?>/delete-my-postulation?id=<?= $postulation->id ?>">Eliminar postulación</a>
      </div>
    </div>

  <?php endforeach; ?>

</div>

<?php

$script = '
<script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/locale/es.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="/build/js/salaryNumberFormat.js"></script>
<script src="/build/js/dateFormat.js"></script>
'

?>