<?php 

namespace Model;

class Alumno extends ActiveRecord{

  protected static $table = 'alumno';
  protected static $columnsDB = ['id', 'nombre', 'apellido', 'domicilio', 'email', 'telefono', 'fecha_nacimiento', 'contraseña'];

  public function __construct($args = [])
  {
    $this->id = $args['id'] ?? null;
    $this->nombre = $args['nombre'] ?? '';
    $this->apellido = $args['apellido'] ?? '';
    $this->domicilio = $args['domicilio'] ?? '';
    $this->email = $args['email'] ?? '';
    $this->telefono = $args['telefono'] ?? '';
    $this->fecha_nacimiento = $args['fecha_nacimiento'] ?? '';
    $this->contraseña = $args['contraseña'] ?? '';
    $this->nuevaContraseña = $args['nuevaContraseña'] ?? '';
    $this->confirmarContraseña = $args['confirmarContraseña'] ?? '';
  }

  public function validateNewAccount(){

    if(!$this->nombre){
      self::$alerts['error'][] = 'El nombre es incorrecto';
    }

    if(!$this->apellido){
      self::$alerts['error'][] = 'El apellido es incorrecto';
    }

    if(!$this->domicilio){
      self::$alerts['error'][] = 'El domicilio es incorrecto';
    }
    
    if(!$this->email){
      self::$alerts['error'][] = 'El correo es incorrecto';
    }
    
    if(!$this->telefono){
      self::$alerts['error'][] = 'El telefono es incorrecto';
    }
    
    if(!$this->fecha_nacimiento){
      self::$alerts['error'][] = 'La fecha de nacimiento es incorrecta';
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
    $_SESSION['fecha_nacimiento'] = trim($this->fecha_nacimiento);

  }

  public function hashPassword(){

    $this->contraseña = password_hash($this->contraseña, PASSWORD_BCRYPT);

  }

}

?>