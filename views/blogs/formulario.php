<fieldset>
    <legend>Información General</legend>

    <label for="titulo">Titulo:</label>
    <input name="blog[titulo]" type="text" id="titulo" placeholder="Titulo del Blog" value="<?php echo sz($blog->titulo); ?>">

    <label for="autor">Autor del Blog:</label>
    <input type="text" name="blog[autor]" id="autor" placeholder="Nombre del autor" value="<?php echo sz($blog->autor); ?>">

    <label for="imagen">Imagen:</label>
    <input type="file" id="imagen" accept="image/jpeg, image/png" name="blog[imagen]">

    <?php if ($blog->imagen) { ?>
        <img src="/imagenes/<?php echo $blog->imagen ?>" class="imagen-small">
    <?php }; ?>

    <label for="detalles">Texto de la entrada:</label>
    <textarea id="detalles" name="blog[detalles]"><?php echo sz($blog->detalles); ?></textarea>
</fieldset>