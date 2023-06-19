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

  public static function changePassword(Router $router){
    
    if($_SESSION['business']){
      $user = Business::find($_SESSION['id']);
    }else{
      $user = Worker::find($_SESSION['id']);
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      
      if(password_verify($_POST['password'], $user->password)){

        $user->password = $_POST['newPassword'];
        $user->hashPassword();

        $result = $user->save();

        if($result){
          redirect('/profile?at=success&am=La contraseña se cambió correctamente');
        }

      }else{
        $alerts = $user::setAlert('error', 'Contraseña actual incorrecta');
      }

    }

    $alerts = $user::getAlerts();

    $router->render('profile/change-password', [
      'title' => 'Perfíl',
      'user' => $user,
      'alerts' => $alerts
    ]);

  }

}


?>