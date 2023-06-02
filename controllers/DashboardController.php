<?php

namespace Controllers;

use Model\ActiveRecord;
use Model\Job;
use MVC\Router;

class DashboardController{

  public static function dashboard(Router $router){

    $query = "SELECT jobs.id, jobs.title, jobs.description, jobs.salary, business.name AS business, jobs.date FROM jobs INNER JOIN business ON jobs.id_business = business.id ORDER BY jobs.id DESC";

    $jobs = ActiveRecord::consultSQL($query);

    $router->render('dashboard/index', [
      'title' => 'Dashboard',
      'jobs' => $jobs
    ]);
    
  }

}

?>