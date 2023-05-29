<?php

define('TEMAPLATES_URL' , __DIR__  . '/components');
define('FUNCIONES_URL' , __DIR__  . '/funciones.php');

function incluirTemplate(string $nombre, bool $inicio = false)
{
    include TEMAPLATES_URL . "/{$nombre}.php";
}

function comprobacionDeLogin()
{
    session_start();
    if (!$_SESSION['login']) header('Location: /login.php');
}

function s($html){
    return htmlspecialchars($html);
}

function mostrarInfo($info , bool $tipo = true){
    echo "<pre>";
    var_dump($info);
    echo "</pre>";
    if($tipo) exit;
}