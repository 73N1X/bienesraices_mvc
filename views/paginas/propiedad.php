<main class="container section center-content">
  <h1><?php echo $propiedad->titulo; ?></h1>

  <picture>
    <img loading="lazy" src="imagenes/<?php echo $propiedad->imagen; ?>" alt="imagen destacada" />
  </picture>

  <div class="resumen-propiedad">
    <p class="precio"><?php echo number_format($propiedad->precio); ?></p>
    <ul class="iconos-caracteristicas">
      <li>
        <img class="icono-d" src="build/img/icono_wc.svg" alt="icono wc" loading="lazy" />
        <p><?php echo $propiedad->wc; ?></p>
      </li>
      <li>
        <img class="icono-d" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento" loading="lazy" />
        <p><?php echo $propiedad->estacionamiento; ?></p>
      </li>
      <li>
        <img class="icono-d" src="build/img/icono_dormitorio.svg" alt="icono dormitorio" loading="lazy" />
        <p><?php echo $propiedad->habitaciones; ?></p>
      </li>
    </ul>

    <p>
    <?php echo $propiedad->descripcion; ?>
    </p>
  </div>
</main>