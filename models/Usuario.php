<?php 

namespace Model;
use FFI\Exception;

class Usuario extends Principal{

    protected static $tabla = "usuarios";
    protected static $columnasDB = ["id" , "email" , "password"];

    public $id;
    public $email;
    public $password;
    
    public function __construct($args = []){
        $this->id = $args["id"] ?? "";
        $this->email = $args["email"] ?? "";
        $this->password = $args["password"] ?? "";
    }

    function validacion():array{
        $errores = [];
        
        $this->email = mysqli_real_escape_string(parent::$db , filter_var($this->email , FILTER_VALIDATE_EMAIL));
        $this->password = mysqli_real_escape_string(parent::$db ,$this->password);

        if(!$this->email) $errores[] = "El email es obligatorio o no es valido";
        if(!$this->password) $errores[] = "El password es obligatorio";

        return $errores;
    }

    function login():array {
        $errores = [];
        
        $query = "SELECT * FROM usuarios WHERE email='$this->email'";
        $result = parent::$db->query($query);
        
        if($result->num_rows === 0){
            $errores[] = "El correo ingresado no esta resgristado";
            return $errores;
        }
        
        $passwordUser = $result->fetch_assoc()["password"];
        if(!password_verify($this->password , $passwordUser)) $errores[] = "La contraseña ingresada no es valida";
        return $errores;
    }
}
