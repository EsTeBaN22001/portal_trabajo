<?php 

namespace Model;

class Job extends ActiveRecord{

  protected static $table = 'jobs';
  protected static $columnsDB = ['id', 'title', 'description', 'id_business', 'date', 'salary'];

  public function __construct($args = []){
  
    $this->id = $args['id'] ?? null;
    $this->title = $args['title'] ?? null;
    $this->description = $args['description'] ?? null;
    $this->id_business = $args['id_business'] ?? null;
    $this->date = $args['date'] ?? null;
    $this->salary = $args['salary'] ?? null;

  }

  public function validateNewJob(){

    if(!$this->title){
      self::$alerts['error'][] = 'El título es incorrecto';
    }

    if(!$this->description){
      self::$alerts['error'][] = 'La descripción es incorrecta';
    }

    if($this->id_business){
      $business = Business::find($this->id_business);

      if(!$business){
        self::$alerts['error'][] = 'La empresa seleccionada no existe';
      }
    }

    if(!$this->date){
      self::$alerts['error'][] = 'La fecha es incorrecta';
    }

    if(!$this->salary){
      self::$alerts['error'][] = 'El sueldo es incorrecto';
    }

    return self::$alerts;

  }

  public static function isPostulated($id_job, $id_worker){

    $query = 'SELECT * FROM postulations WHERE id_job = ' . $id_job . ' AND id_worker = ' . $id_worker . ';';

    return ActiveRecord::consultSQL($query);

  }

}

?>