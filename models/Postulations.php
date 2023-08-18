<?php 

namespace Model;

class Postulations extends ActiveRecord{

  protected static $table = 'postulations';
  protected static $columnsDB = ['id', 'id_job', 'id_worker', 'date'];

  public function __construct($args = []) {
    $this->id = $args['id'] ?? null;
    $this->id_job = $args['id_job'] ?? null;
    $this->id_worker = $args['id_worker'] ?? null;
    $this->date = $args['date'] ?? date('Y-m-d H:i:s');
  }

  public function validateNewPostulation(){

    if(!$this->id_job || !$this->id_worker || !$this->date){
      self::$alerts['error'][] = 'Error al postularse';
    }

    return self::$alerts;

  }

  // Obtiene las postulaciones pero reemplazando los id's de los trabajos y empresas por el contenido de los campos de dichas tablas
  public static function getPostulations($id_worker){

    $query = 'SELECT p.id AS id, j.title, j.salary, j.description, b.name AS business, GROUP_CONCAT(s.title ORDER BY s.title ASC) AS skills, p.date AS postulation_date FROM postulations p JOIN jobs j ON p.id_job = j.id JOIN business b ON j.id_business = b.id LEFT JOIN skills_job sj ON j.id = sj.id_job LEFT JOIN skills s ON sj.id_skill = s.id WHERE p.id_worker = ' . $id_worker . ' GROUP BY p.id;';

    return ActiveRecord::consultSQL($query);

  }

}

?>