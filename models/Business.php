<?php 

namespace Model;

class Business extends ActiveRecord{

  protected static $table = 'business';
  protected static $columnsDB = ['id', 'name', 'email', 'phone', 'password'];

  public function __construct($args = []){
    $this->id = $args['id'] ?? null;
    $this->name = $args['name'] ?? '';
    $this->email = $args['email'] ?? '';
    $this->phone = $args['phone'] ?? '';
    $this->password = $args['password'] ?? '';
    $this->newPassword = $args['newPassword'] ?? '';
    $this->confirmPassword = $args['confirmPassword'] ?? '';
  }

  public function validateNewAccount(){

    if(!$this->name){
      self::$alerts['error'][] = 'El nombre es incorrecto';
    }
    
    if(!$this->email){
      self::$alerts['error'][] = 'El correo es incorrecto';
    }
    
    if(!$this->phone){
      self::$alerts['error'][] = 'El telefono es incorrecto';
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
    
    if(!$this->email){
      self::$alerts['error'][] = 'El correo es incorrecto';
    }
    
    if(!$this->phone){
      self::$alerts['error'][] = 'El telefono es incorrecto';
    }

    return self::$alerts;

  }

  public function startSession(){
    
    session_unset();

    $_SESSION['login'] = true;
    $_SESSION['id'] = $this->id;
    $_SESSION['name'] = trim($this->name);
    $_SESSION['email'] = trim($this->email);
    $_SESSION['phone'] = trim($this->phone);
    $_SESSION['business'] = true;

  }

  public function hashPassword(){

    $this->password = password_hash($this->password, PASSWORD_BCRYPT);

  }

}

?>