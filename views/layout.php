<?php

$login = false;

session_start();

if (isset($_SESSION)) {
    $login = $_SESSION['login'];
}

if(!$inicio) $inicio = false;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <link rel="stylesheet" href="../build/css/app.css">
</head>

<body>

    <header class="header <?php echo $inicio ? 'inicio' : '' ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/">
                    <img src="../build/img/logo.svg" alt="Logotipo de Bienes Raices">
                </a>

                <div class="mobile-menu">
                    <img src="../build/img/barras.svg" alt="icono menu responsive">
                </div>

                <div class="derecha">
                    <img class="dark-mode-boton" src="../build/img/dark-mode.svg">
                    <nav class="navegacion">
                        <a href="/usuarios/nosotros">Nosotros</a>
                        <a href="/usuarios/anuncios">Anuncios</a>
                        <a href="/usuarios/blog">Blog</a>
                        <a href="/usuarios/contacto">Contacto</a>
                        <?php if ($login) : ?>
                            <a href="/usuarios/cerrar">Cerrar Sesion</a>
                        <?php endif; ?>
                    </nav>
                </div>


            </div>

            <?php if ($inicio) { ?>
                <h1>Venta de Casas y Departamentos Exclusivos de Lujo</h1>
            <?php } ?>
        </div>
    </header>

    <?php echo $contenido ?>

    <footer class="footer seccion">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
                <a href="/usuarios/nosotros">Nosotros</a>
                <a href="/usuarios/anuncios">Anuncios</a>
                <a href="/usuarios/blog">Blog</a>
                <a href="/usuarios/contacto">Contacto</a>
            </nav>
        </div>

        <p class="copyright">Todos los derechos Reservados <?php echo date('Y'); ?> &copy;</p>
    </footer>

    <script src="/build/js/bundle.min.js"></script>
</body>

</html>