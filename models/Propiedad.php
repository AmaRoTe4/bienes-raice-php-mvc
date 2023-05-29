<?php 

namespace Model;
use FFI\Exception;

class Propiedad extends Principal{

    protected static $table = "propiedades";
    protected static $columnasDB = ["id","titulo","precio","imagen","descripcion","habitaciones","banios","estacionamientos","vendedor"];
    
    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $banios;
    public $estacionamientos;
    public $vendedor;

    public function __construct($args = []){
        $this->id = $args["id"] ?? "";
        $this->titulo = $args["titulo"] ?? "";
        $this->precio = $args["precio"] ?? 0;
        $this->imagen = $args["imagen"] ?? "";
        $this->descripcion = $args["descripcion"] ?? "";
        $this->habitaciones = $args["habitaciones"] ?? 0;
        $this->banios = $args["banios"] ?? 0;
        $this->estacionamientos = $args["estacionamientos"] ?? 0;
        $this->vendedor = $args["vendedor"] ?? 0;
    }

    function validar($peticion): bool{    
        if(
            $peticion["titulo"] === "" ||
            (int)$peticion["precio"] <= 0 ||
            $peticion["descripcion"] === "" ||
            (int)$peticion["habitaciones"] <= 0 ||
            (int)$peticion["banios"] <= 0 ||
            (int)$peticion["estacionamientos"] < 0 ||
            !parent::$db->escape_string($peticion["titulo"]) ||
            !parent::$db->escape_string($peticion["descripcion"])
        ) return false;
        return true;
    }

    //no funca
    function guardaImagen($imgName):string{
        //try{
        //    $imagen = $_FILES[$imgName]["tmp_name"];
            
        //    if(!$imagen) return "";
    
        //    $name = md5( uniqid( rand() , true) );
        //    $redireccion = "../images/";
        
        //    move_uploaded_file($imagen , $redireccion .  $name . ".jpg");
            
        //    return $name;
        //}catch(Exception $e){
        //    echo "Error: " . $e->getMessage();
        //}
        return "";
    }
    
    //no funca
    function borrarImagen(string $imagen):bool{
        //try{
        //    $pathOldFile = __DIR__ . "/images/$imagen.jgp";
        //    if(file_exists($pathOldFile)){
        //        return unlink($pathOldFile);
        //    }
    
        //    return false;
        //}catch(Exception $e){
        //    echo "Error: " . $e->getMessage();
        //    return false;
        //}
        return true;
    }

}
