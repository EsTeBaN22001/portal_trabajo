<?php 

namespace Controllers;

use Model\Skills;
use MVC\Router;

class SkillsController{

  public static function newSkill(Router $router){

    $skills = Skills::all() ?? [];
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

      $skill = new Skills($_POST);

      $alerts = $skill->validateNewSkill();

      if(empty($alerts)){

        // Verificar que no exista una habilidad igual
        $skillExists = Skills::where('title', $skill->title);

        if(!$skillExists){
          // Guardar la habilidad en la base de datos
          $result = $skill->save();

          if($result){
            redirect('/new-skill?at=success&ac=La habilidad se creó correctamente');
          }
          
        }
        
        $alerts = Skills::setAlert('error', 'La habilidad ya existe');

      }

    }

    $alerts = Skills::getAlerts();
    
    $router->render('skills/newSkill', [
      'title' => 'Crear habilidad',
      'alerts' => $alerts,
      'skills' => $skills
    ]);

  }
}

?>