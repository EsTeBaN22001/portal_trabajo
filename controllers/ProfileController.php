<?php 

namespace Controllers;

use Model\Business;
use Model\Worker;
use MVC\Router;

class ProfileController{

  public static function profile(Router $router){
    
    if($_SESSION['business']){
      $user = Business::find($_SESSION['id']);
    }else{
      $user = Worker::find($_SESSION['id']);
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

      $user->syncUp($_POST);

      $alerts = $user->validateProfile();
      
      if(empty($alerts)){

        $result = $user->save();

        if($result){

          // Actualizar las variables de SESSION
          $user->startSession();
          
          // Redireccionar al usuario
          redirect('/profile');

        }

      }

    }

    $router->render('profile/profile', [
      'title' => 'Perfíl',
      'user' => $user
    ]);
  }

}


?>