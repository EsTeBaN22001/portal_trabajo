<?php 

namespace Model;

class Skills extends ActiveRecord{

  protected static $table = 'skills';
  protected static $columnsDB = ['id', 'title'];

  public function __construct($args = [])
  {
    $this->id = $args['id'] ?? null;
    $this->title = $args['title'] ?? '';
  }

  public function validateNewSkill(){

    if(!$this->title){
      self::$alerts['error'][] = 'El título es obligatorio';
    }

    return self::$alerts;

  }

}


?>