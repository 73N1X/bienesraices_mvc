<article class="entrada-blog">
    <?php foreach($blogs as $blog){ ?>
        <div class="imagen">
            <picture>
                <img loading="lazy" src="imagenes/<?php echo $blog->imagen; ?>" alt="texto Entrada Blog">
            </picture>
        </div>
        <div class="texto-entrada">
            <a href="/entrada?id=<?php echo $blog->id; ?>">
                <h4><?php echo $blog->titulo; ?></h4>
            </a>
            <p>Escrito el: <span><?php echo $blog->fecha; ?></span> por: <span><?php echo $blog->autor; ?></span></p>
            <p><?php echo substr($blog->detalles, 0, 120); ?></p>
        </div>
        <?php } ?>
    </article>
