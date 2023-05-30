<div class="contenedor-anuncios">
    <?php 
        foreach ($propiedades as $pro) :
        if ($limite && $limite <= $vueltas) break;
        $vueltas++;
    ?>
        <div class="anuncio">
            <img loading="lazy" src="build/img/<?php echo $pro->imagen; ?>.jpg" alt="anuncio">
            <div class="contenido-anuncio">
                <h3><?php echo $pro->titulo; ?></h3>
                <p><?php echo $pro->descripcion; ?></p>
                <p class="precio">$<?php echo $pro->precio; ?></p>

                <ul class="iconos-caracteristicas">
                    <li>
                        <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                        <p><?php echo $pro->banios; ?></p>
                    </li>
                    <li>
                        <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                        <p><?php echo $pro->estacionamientos; ?></p>
                    </li>
                    <li>
                        <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                        <p><?php echo $pro->habitaciones; ?></p>
                    </li>
                </ul>

                <a href="/usuarios/anuncio?id=<?php echo $pro->id; ?>" class="boton-amarillo-block">
                    Ver Propiedad
                </a>
            </div>
        </div>
    <?php endforeach; ?>
</div>