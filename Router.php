<?php

namespace MVC;

class Router {
    public $rutasGet = [];
    public $rutasPost = [];

    public function get($url , $funcion){
        $this->rutasGet[$url] = $funcion;
    }

    public function post($url , $funcion){
        $this->rutasPost[$url] = $funcion;
    }

    public function comprobarExistenciaDeLaRuta(){
        $urlActual = $_SERVER['PATH_INFO'] ?? '/';
        $metodo = $_SERVER['REQUEST_METHOD'];

        if($metodo === 'GET') $fn = $this->rutasGet[$urlActual] ?? null;
        else $fn = $this->rutasPost[$urlActual] ?? null;
        if($fn) call_user_func($fn, $this);            
        else echo "Pagina no encontradas";            
    }

    public function render($view , $datos = []){  
        $this->comprarRutas(); 
        
        foreach($datos as $key => $value){
            $$key = $value;
        }
        
        ob_start();
        include __DIR__ . "/views/$view.php";
        $contenido = ob_get_clean();

        include __DIR__ . "/views/layout.php";
    }

    public function comprarRutas(){
        $rutasRestringidas = [
            "/admin",
            "/propiedades/crear",
            "/propiedades/actualizar",
            "/propiedades/eliminar",
        ];

        session_start();
        $sesion = $_SESSION["login"] ?? false;
        
        if(
            !$sesion 
            && in_array($_SERVER["PATH_INFO"], $rutasRestringidas)
        ) header("Location: /");
    }
}