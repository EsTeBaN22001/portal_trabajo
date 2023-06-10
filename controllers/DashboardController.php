<?php

namespace Controllers;

use Model\ActiveRecord;
use MVC\Router;

class DashboardController{

  public static function dashboard(Router $router){

    // $query = "SELECT jobs.id, jobs.title, jobs.description, jobs.salary, business.name AS business, jobs.date FROM jobs INNER JOIN business ON jobs.id_business = business.id ORDER BY jobs.id DESC";

    $query = "SELECT 
        jobs.id, 
        jobs.title, 
        jobs.description, 
        jobs.salary, 
        business.name AS business, 
        jobs.date,
        GROUP_CONCAT(skills.title) AS skills
      FROM 
        jobs
      INNER JOIN 
        business ON jobs.id_business = business.id
      INNER JOIN 
        skills_job ON jobs.id = skills_job.id_job
      INNER JOIN 
        skills ON skills_job.id_skill = skills.id
      GROUP BY 
        jobs.id, 
        jobs.title, 
        jobs.description, 
        jobs.salary, 
        business.name, 
        jobs.date
      ORDER BY 
        jobs.id DESC
  ";

    $jobs = ActiveRecord::consultSQL($query);

    // Convertir el string de las skills en un array para iterarlo en la vista
    foreach($jobs as $job){
      $job->skills = explode(',', $job->skills);
    }

    $router->render('dashboard/index', [
      'title' => 'Dashboard',
      'jobs' => $jobs
    ]);
    
  }

}

?>