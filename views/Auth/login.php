<main class="contenedor">
    <h1>Login Admin</h1>
    <?php foreach ($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error ?>
        </div>
    <?php endforeach ?>
    <form action="" class="formulario" method="POST" action="/login">
        <fieldset>
            <legend>Email y password</legend>

            <label for="email">Email: </label>
            <input name="email" id="email" type="mail" placeholder="Tu correo ejem: correo@correo.com" required value="<?php echo $mail ?>"/>

            <label for="passwd">Password: </label>
            <input name="passwd" id="passwd" type="password" placeholder="Tu passwd" required value="<?php echo $passwd ?>" />
        </fieldset>

        <input type="submit" class="boton-verde" value="iniciar sesion">
    </form>
</main>