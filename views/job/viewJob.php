<div class="container-sm section-sm view-job-container">

  <div class="container-sm  bx-shadow section-ultra-sm section-card-styles">
    <a class="title" href="<?= $_ENV['HOST'] ?>/job?id=<?= $job->id ?>"><h1><?= $job->title ?></h1></a>
    <p class="name-business"><?= $job->business ?></p>
  </div>

  <div class="container-sm  bx-shadow section-ultra-sm section-card-styles">
    <p class="section-ultra-sm salary">Salario: <span class="salary-number"><?= $job->salary ?></span></p>
    <p class="section-ultra-sm description"><?= $job->description ?></p>
    <div class="section-ultra-sm required-skills">
      <p class="required-skills-title">Habilidades requeridas</p>
      <div class="skills">
      
        <?php foreach($job->skills as $skill): ?>
          <div class="skill"><p><?= $skill ?></p></div>
        <?php endforeach; ?>
        
      </div>
    </div>
    <p class="section-ultra-sm date">Fecha de publicación: <span class="date-number"><?= $job->date ?></span></p>
  </div>
  
  <?php if(!$_SESSION['business']): ?>
    <div class="button-container container-sm section-ultra-sm">
      <form action="<?= $_ENV['HOST'] ?>/postulate" method="POST">
        <input type="hidden" name="id_job" value="<?= $job->id ?>">
        <button type="submit" class="bx-shadow postulation-button">Postularme</button>
      </form>
    </div>
  <?php endif; ?>

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