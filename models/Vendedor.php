<?php 

namespace Model;
use FFI\Exception;

class Vendedor extends Principal{

    protected static $table = "vendedores";
    protected static $columnasDB = ["id" , "nombre" , "apellido"];
    public $id;
    public $nombre;
    public $apellido;
    
    public function __construct($args = []){
        $this->id = $args["id"] ?? "";
        $this->nombre = $args["nombre"] ?? "";
        $this->apellido = $args["apellido"] ?? "";
    }
}
