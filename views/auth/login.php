<main class="container section center-content">
    <h1>Iniciar Sesión</h1>

    <?php foreach($errores as $err): ?>

        <div class="alerta error">
            <?php echo $err; ?>
        </div>

    <?php endforeach; ?>

    <form method="POST" class="formulario" action="/login">
    <fieldset>
            <legend>Email y Password</legend>
            <label for="email">E-Mail</label>
            <input type="email" name="email" id="email" placeholder="E-Mail" >

            <label for="password">Contraseña</label>
            <input type="password" name="password" id="pass" placeholder="Contraseña" >
        </fieldset>

        <input type="submit" value="Iniciar Sesión" class="boton boton-verde">
    </form>
</main>