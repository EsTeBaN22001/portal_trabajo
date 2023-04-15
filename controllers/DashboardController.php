<?php

namespace Controllers;

use MVC\Router;

class DashboardController{

  public static function dashboard(Router $router){

    $router->render('dashboard/index', [
      'title' => 'Dashboard'
    ]);
    
  }

}

?>