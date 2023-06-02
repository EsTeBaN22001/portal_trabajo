<?php 

namespace Model;

class Worker extends ActiveRecord{

  protected static $table = 'worker';
  protected static $columnsDB = ['id', 'name', 'surname', 'domicile', 'email', 'phone', 'date', 'password'];

  public function __construct($args = [])
  {
    $this->id = $args['id'] ?? null;
    $this->name = $args['name'] ?? '';
    $this->surname = $args['surname'] ?? '';
    $this->email = $args['email'] ?? '';
    $this->phone = $args['phone'] ?? '';
    $this->date = $args['date'] ?? '';
    $this->password = $args['password'] ?? '';
    $this->newPassword = $args['newPassword'] ?? '';
    $this->confirmPassword = $args['confirmPassword'] ?? '';
  }

  public function validateNewAccount(){

    if(!$this->name){
      self::$alerts['error'][] = 'El nombre es incorrecto';
    }

    if(!$this->surname){
      self::$alerts['error'][] = 'El apellido es incorrecto';
    }

    if(!$this->domicile){
      self::$alerts['error'][] = 'El domicilio es incorrecto';
    }
    
    if(!$this->email){
      self::$alerts['error'][] = 'El correo es incorrecto';
    }
    
    if(!$this->phone){
      self::$alerts['error'][] = 'El telefono es incorrecto';
    }
    
    if(!$this->date){
      self::$alerts['error'][] = 'La fecha de nacimiento es incorrecta';
    }

    
    if(!$this->password){
      self::$alerts['error'][] = 'La contraseña es incorrecta';
    }
    
    if($this->confirmPassword != $this->password){
      self::$alerts['error'][] = 'La confirmación de la contraseña es incorrecta';
    }

    return self::$alerts;

  }

  public function validateLogin(){

    if(!$this->email){
      self::$alerts['error'][] = 'El correo es incorrecto';
    }

    if(!$this->password){
      self::$alerts['error'][] = 'La contraseña es incorrecta';
    }

    return self::$alerts;

  }

  public function validateProfile(){

    if(!$this->name){
      self::$alerts['error'][] = 'El nombre es incorrecto';
    }

    if(!$this->surname){
      self::$alerts['error'][] = 'El apellido es incorrecto';
    }

    if(!$this->email){
      self::$alerts['error'][] = 'El correo es incorrecto';
    }

    return self::$alerts;

  }

  public function startSession(){
    
    session_unset();

    $_SESSION['login'] = true;
    $_SESSION['id'] = $this->id;
    $_SESSION['name'] = trim($this->name);
    $_SESSION['surname'] = trim($this->surname);
    $_SESSION['email'] = trim($this->email);
    $_SESSION['phone'] = trim($this->phone);
    $_SESSION['domicile'] = trim($this->domicile);
    $_SESSION['date'] = trim($this->date);
    $_SESSION['business'] = false;

  }

  public function hashPassword(){

    $this->password = password_hash($this->password, PASSWORD_BCRYPT);

  }

}

?>