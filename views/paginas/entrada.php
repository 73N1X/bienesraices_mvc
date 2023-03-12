<main class="container section center-content">
  <h1><?php echo $blog->titulo; ?></h1>

  <picture>
    <img loading="lazy" src="imagenes/<?php echo $blog->imagen; ?>" alt="imagen destacada" />
  </picture>
  <p class="informacion-meta">Escrito el: <span><?php echo $blog->fecha; ?></span> por: <span><?php echo $blog->autor; ?></span></p>

  <div class="resumen-propiedad">
    <p><?php echo $blog->detalles; ?></p>
  </div>
</main>