<?php 

namespace Controllers;

use MVC\Router;

class IndexController{

  public static function index(Router $router){

    // OBTENER LAS ENCUESTAS MÁS POPULARES
    
    $router->renderLogin('index', [
      'title' => 'Página principal'
    ]);

  }

}