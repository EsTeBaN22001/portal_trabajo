<?php 

namespace Controllers;

use Model\Alumno;
use Model\Empresa;
use MVC\Router;

class LoginController{

  public static function login(Router $router){
    
    // Variable para las alertas
    $alerts = [];

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

      // Verificar si se está logueando una empresa o un alumno
      $userPost = Alumno::where('email', $_POST['email']);

      if($userPost){
        $userExists = $userPost;
      }else{
        $userExists = Empresa::where('email', $_POST['email']);
      }
  
      if($userExists){

        $passwordVerify = password_verify($_POST['contraseña'], $userExists->contraseña);

        if($passwordVerify){

          // Iniciar la sesión con $_SESSION
          $userExists->startSession();

          header('Location: ' . $_ENV['HOST'] . '/dashboard');

        }else{
          $alerts = Alumno::setAlert('error', 'La contraseña es incorrecta');
        }

      }else{

        $alerts = Alumno::setAlert('error', 'El usuario no existe');

      }

    }

    $alerts = Alumno::getAlerts();
    
    $router->renderLogin('login', [
      'title' => 'Iniciar sesión',
      'alerts' => $alerts
    ]);

  }

  public static function register(Router $router){

    // Variable por si se registra un alumno
    $alumno = new Alumno();

    // Variable por si se registra una empresa
    $empresa = new Empresa();

    $alerts = [];
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

      if($_POST['type'] == "alumno"){

        $alumno->syncUp($_POST);

        $alerts = $alumno->validateNewAccount();
  
        if(empty($alerts)){
          
          // validar la contraseña y hasearla
          $alumno->hashPassword();
          
          // liberar el campo de confirmar contraseña si es igual
          unset($alumno->confirmarContraseña);
          unset($alumno->nuevaContraseña);

          // Si no hay errores guardar en la base de datos
          $result = $alumno->save();

          if($result){
            header('Location: /login?alert=success');
          }
  
        }

      }

      if($_POST['type'] == "empresa"){

        $empresa->syncUp($_POST);

        $alerts = $empresa->validateNewAccount();
  
        if(empty($alerts)){
          
          // validar la contraseña y hasearla
          $empresa->hashPassword();
          
          // liberar el campo de confirmar contraseña si es igual
          unset($empresa->confirmarContraseña);
          unset($empresa->nuevaContraseña);

          // Si no hay errores guardar en la base de datos
          $result = $empresa->save();

          if($result){
            header('Location: /login?alert=success');
          }
  
        }

      }

    }
    
    $router->renderLogin('register', [
      'title' => 'Registrate',
      'alerts' => $alerts,
      'alumno' => $alumno,
      'empresa' => $empresa
    ]);
  }

  public static function logout(){

    session_unset();

    header('Location: /');

  }

}

?>