<?php 

namespace Controllers;

use Model\Job;
use Model\Skills;
use Model\Skills_job;
use MVC\Router;

class JobController{

  public static function newJob(Router $router){

    
    // Obtener todas las skills de la DB
    $skills = Skills::all();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

      // debugstop($_POST);

      // Crear un nuevo trabajo
      $job = new Job($_POST);
      $job->id_business = $_SESSION['id'];
      $job->date = date('Y-m-d H:i:s');

      // Validar un nuevo trabajo
      $alerts = $job->validateNewJob();

      
      // Validar si se seleccionó al menos una habilidad
      $skillsPost = $_POST['skills'] ?? null;
      
      if(!$skillsPost){
        $alerts['error'][] = 'Debes seleccionar al menos una habilidad';
      }

      if(empty($alerts)){

        $result = $job->save();

        if($result){

          // Guardar las skills del trabajo en la tabla skills_jobs
          foreach ($skillsPost as $skillId) {

            // Guardar el id de la skill y del trabajo en la tabla de skills_job
            $skillJob = new Skills_job();
            $skillJob->id_job = $result['id'];
            $skillJob->id_skill = $skillId;

            $skillJob->save();
            
          }

          header('Location: ' . $_ENV['HOST'] . '/dashboard?at=success&ac=El trabajo se creó correctamente');

        }

      }

    }

    $alerts = Job::getAlerts();
    
    $router->render('job/newJob', [
      'title' => 'Nuevo Trabajo',
      'alerts' => $alerts,
      'skills' => $skills
    ]);

  }

}

?>