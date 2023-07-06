<?php 

namespace Controllers;

use Model\ActiveRecord;
use Model\Business;
use Model\Skills;
use Model\Skills_workers;
use Model\Worker;
use MVC\Router;

class ProfileController{

  public static function profile(Router $router){

    // Verificar si es usuario o empresa y crear la entidad.
    // Si es usuario obtener las skills
    if($_SESSION['business']){
      $user = Business::find($_SESSION['id']);
    }else{

      $user = Worker::find($_SESSION['id']);

      // Obtener las skills del trabajador
      $query = "SELECT skills.id, title FROM skills_workers INNER JOIN skills ON skills_workers.id_skill = skills.id WHERE id_worker = " . $_SESSION['id'];
      $skills = ActiveRecord::consultSQL($query);

    }

    // Obtener todas las skills para el input de agregar skills
    $allSkills = Skills::all();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

      if(isset($_POST['userInfo'])){

        $user->syncUp($_POST['userInfo']);

        $alerts = $user->validateProfile();
        
        if(empty($alerts)){
  
          $result = $user->save();
  
          if($result){
  
            // Actualizar las variables de SESSION
            $user->startSession();
            
            // Redireccionar al usuario
            redirect('/profile?at=success&am=Se guardaron los cambios correctamente');
  
          }
  
        }

      }

      if(isset($_POST['skills'])){
        
        $skills = $_POST['skills'] ?? [];

        // Eliminar todas las habilidades anteriores del usuario en la tabla workers_skills
        $query = "DELETE FROM skills_workers WHERE id_worker = " . $_SESSION['id'] . ";";
        $result = ActiveRecord::consultStaticSQL($query);

        if($result){
          // Añadir las nuevas habilidades del usuario en la tabla workers_skills
          foreach($skills as $skill){
            // $newSkill = new Skills_workers([
            //   'id_worker' => $_SESSION['id'],
            //   'id_skill' => $skill
            // ]);
            $result = Skills_workers::addSkillsWorkers($_SESSION['id'], $skill);
          }

          redirect('/profile?at=success&am=Se guardaron las habilidades correctamente');

        }

        
      }

    }

    $router->render('profile/profile', [
      'title' => 'Perfíl',
      'user' => $user,
      'skills' => $skills ?? [],
      'allSkills' => $allSkills
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