<div class="contenedor-anuncios">
    <?php foreach($propiedades as $propiedad){ ?>
    <div class="anuncio">
        <img loading="lazy" src="imagenes/<?php echo $propiedad->imagen; ?>" alt="anuncio" />
      </picture>
      <div class="contenido-anuncio">
        <h3><?php echo $propiedad->titulo; ?></h3>
        <p>
        <p><?php echo substr($propiedad->descripcion, 0, 120); ?> ...</p>
        </p>
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
        <a href="/propiedad?id=<?php echo $propiedad->id; ?>" class="boton-amarillo-block">Ver Propiedad</a>
      </div>
    </div>
    <?php } ?>
  </div>