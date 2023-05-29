<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;

class ProControllers
{
    public static function index(Router $router)
    {
        $propiedades = Propiedad::getAll();

        $router->render("index", [
            'propiedades' => $propiedades
        ]);
    }

    public static function actualizar(Router $router)
    {
        $id = $_GET['id'];
        $id = filter_var((int)$id, FILTER_VALIDATE_INT);
        if (!$id) header("Location: /admin");

        $vendedores = Vendedor::getAll();
        $propiedad = Propiedad::get($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nameImage = "";

            if ($_FILES["imagen"]["tmp_name"] !== "") $nameImage = $propiedad->guardaImagen("imagen");
            $_POST["propiedades"]['imagen'] = $nameImage;
            $validacion = $propiedad->validar($_POST["propiedades"]);
            $propiedad = new Propiedad($_POST["propiedades"]);
            $propiedad->id = $id;
            if ($validacion) {
                $resulatoDeEditar = $propiedad->update();
                if ($resulatoDeEditar) header("location: /admin?resultado=2");
                else echo "Error al subir el formulario";
                return;
            }
            echo "errore en el formulario";
        }

        $router->render("actualizar", [
            'vendedores' => $vendedores,
            'propiedad' => $propiedad
        ]);
    }

    public static function crear(Router $router)
    {
        $vendedores = Vendedor::getAll();
        $propiedad = new Propiedad;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $propiedad->guardaImagen("imagen");
            $validacion = $propiedad->validar($_POST["propiedades"]);
            $_POST['propiedades']["imagen"] = $nombre;
            $propiedad = new Propiedad($_POST["propiedades"]);
            if ($validacion) {
                $resulatoDeCrear = $propiedad->create();
                if ($resulatoDeCrear) header("location: /admin?resultado=1");
                else echo "Error al subir el formulario";
                return;
            }
            echo "error en el formulario";
        }

        $router->render("crear", [
            'vendedores' => $vendedores,
            'propiedad' => $propiedad
        ]);
    }

    public static function eliminar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $propiedad = Propiedad::get($_POST['id']);
            $imagen = $_POST['imagen'];

            $propiedad->delete();
            $propiedad->borrarImagen($imagen);
            header("location: /admin?resultado=3");
        }
    }
}
