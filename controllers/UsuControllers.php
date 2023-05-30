<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Model\Usuario;

class UsuControllers
{
    public static function index(Router $router)
    {
        $inicio = true;
        $propiedades = Propiedad::getAll();

        $router->render("usuarios/index" , [
            "inicio" => $inicio,
            "propiedades" => $propiedades
        ]);
    }

    public static function anuncio(Router $router)
    {
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);
        if(!$id) header("Location: /"); 

        $propiedad = Propiedad::get($id);
        if(!$propiedad) header("Location: /");
        
        $router->render("usuarios/anuncio" , [
            "propiedad" => $propiedad,
            "id" => $id
        ]);
    }

    public static function anuncios(Router $router)
    {
        $propiedades = Propiedad::getAll();
        $router->render("usuarios/anuncios", [
            "propiedades" => $propiedades
        ]);
    }

    public static function blog(Router $router)
    {
        $router->render("usuarios/blog");
    }

    public static function contacto(Router $router)
    {
        $router->render("usuarios/contacto");
    }

    public static function entrada(Router $router)
    {
        $router->render("usuarios/entrada");
    }

    public static function login(Router $router)
    {
        $errores = [];

        $data = [
            "email" => "",
            "password" => "",
        ];
        $usuario = new Usuario($data);
        
        if($_SERVER['REQUEST_METHOD'] === "POST"){
            //carga de datos
            $usuario->email = $_POST['email'];
            $usuario->password = $_POST['password'];

            //validaciones
            $errores = $usuario->validacion();
            if(!empty($errores)) return;    
            $errores = $usuario->login();
            if(!empty($errores)) return;

            //login
            session_start();
            $_SESSION["email"] = $usuario->email;
            $_SESSION["password"] = $usuario->password;
            $_SESSION["login"] = true;

            header("Location: /admin");
        }
        
        $router->render("usuarios/login" , [
            "usuario" => $usuario,
            "errores" => $errores
        ]);
    }

    public static function nosotros(Router $router)
    {
        $router->render("usuarios/nosotros");
    }

    public static function cerrar()
    {
        session_start();
        $_SESSION = [];
        header("Location: /");
    }

}
