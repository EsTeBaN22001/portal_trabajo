<?php if (isset($_GET['at']) && $_GET['ac']): ?>
    <div class="section-sm container-sm alerts-container">
      <div class="alert <?= $_GET['at'] ?>">
        <?= $_GET['ac'] ?>
      </div>
    </div>
  <?php endif?>

<div class="container-sm section-sm header-section-dashboard search-title-container">
  <h2>Buscar trabajo</h2>
  <div class="search-container">
    <input type="search">
    <i class="search-icon fa-solid fa-magnifying-glass"></i>
  </div>
</div>

<div class="container-sm section-sm card-jobs">

  <?php foreach($jobs as $job): ?>
  
    <div class="card bx-shadow">
      <div class="card-header">
        <a class="title" href="<?= $_ENV['HOST'] ?>/view-job?id=<?= $job->id ?>"><h3><?= $job->title ?></h3></a>
        <p class="name-business"><?= $job->business ?></p>
      </div>
      <div class="card-body">
        <p class="salary">Salario: <span class="salary-number"><?= $job->salary ?></span></p>
        <p class="description"><?= $job->description ?></p>
        <div class="required-skills">
          <p class="required-skills-title">Habilidades requeridas</p>
          <div class="skills">
          
            <?php foreach($job->skills as $skill): ?>
              <div class="skill"><p><?= $skill ?></p></div>
            <?php endforeach; ?>
            
          </div>
        </div>
      </div>
      <div class="card-footer">
        <p class="date">Fecha de publicación: <span class="date-number"><?= $job->date ?></span></p>
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