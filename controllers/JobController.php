<?php 

namespace Controllers;

use Model\ActiveRecord;
use Model\Business;
use Model\Job;
use Model\Skills;
use Model\Skills_job;
use MVC\Router;

class JobController{

  public static function newJob(Router $router){

    
    // Obtener todas las skills de la DB
    $skills = Skills::all();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

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

  public static function viewJob(Router $router){

    if(!isset($_GET['id']) || empty($_GET['id'])){
      header('Location: ' . $_ENV['HOST'] . '/dashboard');
    }


    if(isset($_GET['id'])){

      $id = $_GET['id'];
      $query = 'SELECT jobs.id, jobs.title, jobs.description, jobs.date, jobs.salary, business.name AS business, GROUP_CONCAT(skills.title) AS skills
      FROM jobs
      INNER JOIN business ON jobs.id_business = business.id
      INNER JOIN skills_job ON jobs.id = skills_job.id_job
      INNER JOIN skills ON skills_job.id_skill = skills.id
      WHERE jobs.id = ' . $id . '
      GROUP BY jobs.id';

      $job = ActiveRecord::consultSQL($query);
      $job = array_shift($job);

      // Convertir el string de skills en un array
      $job->skills = explode(',', $job->skills);

      
      // Si no existe un trabajo redirigir al usuario al dashboard
      if(!$job){
        header('Location: ' . $_ENV['HOST'] . '/dashboard');
      }
      
    }
    
    $router->render('job/viewJob', [
      'title' => $job->title,
      'job' => $job
    ]);

  }

}

?>