<?php 

namespace Model;

use Model\ActiveRecord;

class Skills_workers extends ActiveRecord{

  protected static $table = 'skills_workers';
  protected static $columsDB = ['id', 'id_worker', 'id_skill'];

  public function __construct($args = []){
    $this->id = $args['id'] ?? null;
    $this->id_worker = $args['id_worker'] ?? null;
    $this->id_skill = $args['id_skill'] ?? null;
  }

}

?>