<main class="container section">
    <h1>Actualizar entrada</h1>
    <?php foreach ($errores as $err) : ?>
        <div class="alerta error">
            <?php echo $err; ?>
        </div>

    <?php endforeach; ?>
    <a href="/admin" class="boton boton-amarillo">Volver</a>
    <form class="formulario" method="POST" enctype="multipart/form-data">
        <?php include 'formulario.php';?>
        <input type="submit" value="Actualizar Entrada" class="boton boton-verde">
    </form>
</main>