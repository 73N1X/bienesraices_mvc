<main class="container section">
    <h1>Administrador de Bienes Raices</h1>

<?php
    if($result) {
        $mensaje = notificacion(intval($result));
        if ($mensaje) { ?>
            <p class="alerta exito"><?php echo sz($mensaje); ?></p>
        <?php }
   } 
?>

    <div class="admButtons">
        <a href="/propiedades/crear" class="boton boton-verde">Nueva Propiedad</a>
        <a href="/vendedores/crear" class="boton boton-verde">Nuev@ Vendedor(a)</a>
        <a href="/blogs/crear" class="boton boton-verde"> Nueva Entrada</a>
    </div>

    <h2>Propiedades</h2>

    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody><!-- Mostrar los resultados -->
            <?php foreach ($propiedades as $propiedad) : ?>
                <tr>
                    <td><?php echo $propiedad->id; ?></td>
                    <td><?php echo $propiedad->titulo; ?></td>
                    <td><img src="/imagenes/<?php echo $propiedad->imagen; ?>" class="imagen-tabla"></td>
                    <td><?php echo $propiedad->precio; ?></td>
                    <td>
                        <form method="POST" class="w-100" action="/propiedades/eliminar">
                            <input type="hidden" name="id" value=" <?php echo $propiedad->id; ?> ">
                            <input type="hidden" name="tipo" value="propiedad">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                        <a href="propiedades/actualizar?id=<?php echo $propiedad->id; ?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <h2>Vendedores</h2>
    <table class="propiedades">
        <thead>
            <tr>
                <div class="admList">
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </div>
            </tr>
        </thead>
        <tbody><!-- Mostrar los resultados -->
            <?php foreach ($vendedores as $vendedor) : ?>
                <tr>
                    <td><?php echo $vendedor->id; ?></td>
                    <td><?php echo $vendedor->nombre . " " . $vendedor->apellido; ?></td>
                    <td><?php echo $vendedor->telefono; ?></td>
                    <td><?php echo $vendedor->email; ?></td>
                    <td>
                        <form method="POST" class="w-100" action="/vendedores/eliminar">
                            <input type="hidden" name="id" value=" <?php echo $vendedor->id; ?> ">
                            <input type="hidden" name="tipo" value="vendedor">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                        <a href="vendedores/actualizar?id=<?php echo $vendedor->id; ?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <h2>Entradas de Blog</h2>
    <table class="propiedades">
        <thead>
            <tr>
                <div class="admList">
                    <th>ID</th>
                    <th>Título</th>
                    <th>Creado</th>
                    <th>Autor</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </div>
            </tr>
        </thead>
        <tbody><!-- Mostrar los resultados -->
            <?php foreach ($blog as $blog) : ?>
                <tr>
                    <td><?php echo $blog->id; ?></td>
                    <td><?php echo $blog->titulo;?></td>
                    <td><?php echo $blog->fecha; ?></td>
                    <td><?php echo $blog->autor; ?></td>
                    <td><img src="/imagenes/<?php echo $blog->imagen; ?>" class="imagen-tabla"></td>
                    <td>
                        <form method="POST" class="w-100" action="/blogs/eliminar">
                            <input type="hidden" name="id" value=" <?php echo $blog->id; ?> ">
                            <input type="hidden" name="tipo" value="blog">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                        <a href="blogs/actualizar?id=<?php echo $blog->id; ?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>