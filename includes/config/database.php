<?php

function conectarBD(){
    $db = null;
    try{
        $db = mysqli_connect("127.0.0.1", 'root' , "" , "BienesRaices");
    
        if(!$db) {
            echo "no conectado";
            exit;
        } 

    }catch(Exception $e){
        echo $e->getMessage();
    }finally{
        return $db;
    }
}