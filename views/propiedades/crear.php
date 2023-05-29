<main class="contenedor seccion">
    <h1>Crear</h1>

    <a href="/admin" class="boton boton-verde">Volver</a>

    <form method="POST" class="formulario" enctype="multipart/form-data">
        <fieldset>
            <legend>Informacion General</legend>

            <label for="titulo">Titulo:</label>
            <input required value="<?php echo s($propiedad->titulo) ?>" type='text' id="titulo" name="propiedades[titulo]" placeholder="Titulo Propiedad">

            <label for="precio">Precio:</label>
            <input required value="<?php echo s($propiedad->precio) ?>" type='number' id="precio" name="propiedades[precio]" placeholder="Precio Propiedad">

            <label for="imagen">Imagen:</label>
            <input required value="<?php echo s($propiedad->imagen) ?>" type='file' id="imagen" name="propiedades[imagen]" accept="image/jpeg , image/png">

            <label for="descripcion">Description:</label>
            <textarea required id="descripcion" name="propiedades[descripcion]"><?php echo s($propiedad->descripcion) ?></textarea>
        </fieldset>

        <fieldset>
            <legend>Informacion de la Propiedad</legend>

            <label for="habitaciones">Habitaciones:</label>
            <input value="<?php echo s($propiedad->habitaciones) ?>" type='number' id="habitaciones" name="propiedades[habitaciones]" placeholder="Ej: 3" min="1">

            <label for="banios">Baños:</label>
            <input value="<?php echo s($propiedad->banios) ?>" type='number' id="banios" name="propiedades[banios]" placeholder="Ej: 3" min="1">

            <label for="estacionamientos">Estacionamientos:</label>
            <input value="<?php echo s($propiedad->estacionamientos) ?>" type='number' id="estacionamientos" name="propiedades[estacionamientos]" placeholder="Ej: 3" min="1">
        </fieldset>

        <fieldset>
            <legend>Vendedor</legend>

            <select value="<?php echo s($propiedad->vendedor) ?>" name="propiedades[vendedor]">
                <?php foreach($vendedores as $ven):?> 
                    <option 
                        <?php echo s($propiedad->vendedor) === $ven->id ? "selected" : ""; ?> 
                        value="<?php echo $ven->id; ?> 
                    "> 
                        <?php echo s($ven->nombre) . ' ' . s($ven->apellido); ?>
                    </option>" 
                <?php endforeach ?> 
            </select>
        </fieldset>

        <input type="submit" value="Crear Propiedad" class="boton boton-verde">
    </form>
</main>