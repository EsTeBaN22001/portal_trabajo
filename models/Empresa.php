<?php 

namespace Model;

class Empresa extends ActiveRecord{

  protected static $table = 'empresa';
  protected static $columnsDB = ['id', 'nombre', 'domicilio', 'email', 'telefono', 'contraseña'];

  public function __construct($args = []){
    $this->id = $args['id'] ?? null;
    $this->nombre = $args['nombre'] ?? '';
    $this->domicilio = $args['domicilio'] ?? '';
    $this->email = $args['email'] ?? '';
    $this->telefono = $args['telefono'] ?? '';
    $this->contraseña = $args['contraseña'] ?? '';
    $this->nuevaContraseña = $args['nuevaContraseña'] ?? '';
    $this->confirmarContraseña = $args['confirmarContraseña'] ?? '';
  }

  public function validateNewAccount(){

    if(!$this->nombre){
      self::$alerts['error'][] = 'El nombre es incorrecto';
    }
    
    if(!$this->email){
      self::$alerts['error'][] = 'El correo es incorrecto';
    }
    
    if(!$this->telefono){
      self::$alerts['error'][] = 'El telefono es incorrecto';
    }
    
    if(!$this->contraseña){
      self::$alerts['error'][] = 'La contraseña es incorrecta';
    }
    
    if($this->confirmarContraseña != $this->contraseña){
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
    $_SESSION['nombre'] = trim($this->nombre);
    $_SESSION['apellido'] = trim($this->apellido);
    $_SESSION['email'] = trim($this->email);
    $_SESSION['telefono'] = trim($this->telefono);
    $_SESSION['domicilio'] = trim($this->domicilio);

  }

  public function hashPassword(){

    $this->contraseña = password_hash($this->contraseña, PASSWORD_BCRYPT);

  }

}

?>