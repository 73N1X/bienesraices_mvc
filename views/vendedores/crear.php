<main class="container section">
    <h1>Nuev@ Vendedor(a)</h1>
    <?php foreach ($errores as $err) : ?>
        <div class="alerta error">
            <?php echo $err; ?>
        </div>

    <?php endforeach; ?>
    <a href="/admin" class="boton boton-amarillo">Volver</a>
    <form class="formulario" method="POST">
        <?php include 'formulario.php' ?>
        <input type="submit" value="Registrar Vendedor" class="boton boton-verde">
    </form>
</main>