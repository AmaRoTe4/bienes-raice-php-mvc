<main class="contenedor seccion contenido-centrado">
    <h1>Iniciar Sesion</h1>
    <?php foreach($errores as $error): ?>
        <p style="color: red; margin: 0 4px;"><?php echo $error ?></p>
    <?php endforeach; ?>
    <form method="POST" action="/usuarios/login" class="formulario contenido-centrado">
        <fieldset>
            <legend>Email and Password</legend>

            <label for="titulo">Titulo:</label>
            <input 
                value="<?php echo s($usuario->email) ?>" 
                type='email' 
                id="email" 
                name="email" 
                placeholder="Email"
            >

            <label for="precio">Precio:</label>
            <input 
                value="<?php echo s($usuario->password) ?>" 
                type='password' 
                id="password" 
                name="password" 
                placeholder="Password"
            >
        </fieldset>
        <input type="submit" class="boton boton-verde" value="Iniciar Sesion" style="margin: 10px 0px">
    </form>

</main>