<?php 

require_once __DIR__  . '/../includes/app.php';

use MVC\Router;
use Controllers\ProControllers;

$router = new MVC\Router();

$router->get('/admin' , [ProControllers::class , 'index']);
$router->get('/propiedades/crear' , [ProControllers::class , 'crear']);
$router->get('/propiedades/actualizar' , [ProControllers::class , 'actualizar']);
$router->post('/propiedades/crear' , [ProControllers::class , 'crear']);
$router->post('/propiedades/actualizar' , [ProControllers::class , 'actualizar']);
$router->post('/propiedades/eliminar' , [ProControllers::class , 'eliminar']);

$router->comprobarExistenciaDeLaRuta();