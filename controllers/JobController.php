<?php 

namespace Controllers;

use Model\Job;
use MVC\Router;

class JobController{

  public static function newJob(Router $router){

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

      $job = new Job($_POST);
      $job->id_business = $_SESSION['id'];
      $job->date = date('Y-m-d H:i:s');
      
      $alerts = $job->validateNewJob();

      if(empty($alerts)){

        $result = $job->save();

        if($result){

          header('Location: ' . $_ENV['HOST'] . '/dashboard?at=success&ac=El trabajo se creó correctamente');

        }

      }


    }

    $alerts = Job::getAlerts();
    
    $router->render('job/newJob', [
      'title' => 'Nuevo Trabajo',
      'alerts' => $alerts
    ]);

  }

}

?>