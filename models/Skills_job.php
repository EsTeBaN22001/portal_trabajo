<?php

namespace Model;

class Skills_job extends ActiveRecord{

  protected static $table = 'skills_job';
  protected static $columnsDB = ['id', 'id_job', 'id_skill'];

  public function __construct($args = [])
  {
    $this->id = $args['id'] ?? null;
    $this->id_job = $args['id_job'] ?? null;
    $this->id_skill = $args['id_skill'] ?? null;
  }

}


?>