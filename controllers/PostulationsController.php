<?php 

namespace Controllers;

use Model\Postulations;
use MVC\Router;

class PostulationsController{
  
  public static function postulate(){

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

      if(!isset($_POST['id_job']) && $_SESSION['business']){ redirect('/my-postulations'); }

      $postulation = new Postulations($_POST);
      $postulation->id_worker = $_SESSION['id'];

      $alerts = $postulation->validateNewPostulation();
      
      if(empty($alerts)){

        $result = $postulation->save();

        if($result){
          redirect('/my-postulations?at=success&am=Se postuló correctamente');
        }

      }
      
      debugstop($alerts);

    }

  }

  public static function myPostulations(Router $router){

    $postulations = Postulations::getPostulations($_SESSION['id']);

    // Mapear las skills en un array
    foreach($postulations as $postulation){
      $postulation->skills = explode(',', $postulation->skills);
    }
    
    $router->render('postulations/my-postulations', [
      'title' => 'Mis postulaciones',
      'postulations' => $postulations ?? []
    ]);

  }

  public static function deleteMyPostulation(){

    $idPostulation = $_GET['id'] ?? null;

    if(!$idPostulation){
      redirect('/my-postulations');
    }

    $postulation = Postulations::find($idPostulation);

    if(!$postulation){
      redirect('/my-postulations');
    }
    
    $deleteResult = $postulation->delete();
    
    if($deleteResult){
      redirect('/my-postulations?at=success&am=La postulación se eliminó correctamente');
    }

  }
}

?>