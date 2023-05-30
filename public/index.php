<?php 

require_once __DIR__  . '/../includes/app.php';

use MVC\Router;
use Controllers\ProControllers;
use Controllers\UsuControllers;

$router = new MVC\Router();

//admin
$router->get('/admin' , [ProControllers::class , 'index']);
$router->get('/propiedades/crear' , [ProControllers::class , 'crear']);
$router->get('/propiedades/actualizar' , [ProControllers::class , 'actualizar']);
$router->post('/propiedades/crear' , [ProControllers::class , 'crear']);
$router->post('/propiedades/actualizar' , [ProControllers::class , 'actualizar']);
$router->post('/propiedades/eliminar' , [ProControllers::class , 'eliminar']);

//publico
$router->get('/' , [UsuControllers::class , 'index']);
$router->get('/usuarios/anuncio' , [UsuControllers::class , 'anuncio']);
$router->get('/usuarios/anuncios' , [UsuControllers::class , 'anuncios']);
$router->get('/usuarios/blog' , [UsuControllers::class , 'blog']);
$router->get('/usuarios/contacto' , [UsuControllers::class , 'contacto']);
$router->get('/usuarios/entrada' , [UsuControllers::class , 'entrada']);
$router->get('/usuarios/login' , [UsuControllers::class , 'login']);
$router->get('/usuarios/nosotros' , [UsuControllers::class , 'nosotros']);
$router->get('/usuarios/cerrar' , [UsuControllers::class , 'cerrar']);
$router->post('/usuarios/login' , [UsuControllers::class , 'login']);

$router->comprobarExistenciaDeLaRuta();
$router->comprarRutas();