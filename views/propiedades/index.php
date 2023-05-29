<main class="contenedor seccion">
    <h1>Admin de Bienes Raices</h1>

    <a href="/propiedades/crear" class="boton boton-verde">Crear</a>

    <table class="propiedades">
        <thead>
            <tr>
                <th>id</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($propiedades as $pro) : ?>
                <tr>
                    <td style="text-align: center"><?php echo $pro->id; ?></td>
                    <td style="text-align: center"><?php echo $pro->titulo; ?></td>
                    <td style="text-align: center">
                        <?php if ($pro->imagen) : ?>
                            <img src="/build/<?php echo $pro->imagen; ?>.jpg" class="imagen-tabla" alt="">
                        <?php endif; ?>
                    </td>
                    <td style="text-align: center">$<?php echo $pro->precio; ?></td>
                    <td style="text-align: center">
                        <a href="/propiedades/actualizar?id=<?php echo $pro->id ?>" class="boton-amarillo-block">
                            Actulizar
                        </a>
                        <form style="width: 100%" action="/propiedades/eliminar" method="POST">
                            <input type="hidden" name="id" value="<?php echo $pro->id ?>">
                            <input type="hidden" name="imagen" value="<?php echo $pro->imagen ?>">
                            <input style="width: 100%" class="boton-rojo-block" type="submit" value="Eliminar">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>