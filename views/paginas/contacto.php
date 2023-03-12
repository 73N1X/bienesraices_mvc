<main class="container section">
    <h1>Contacto</h1>
    <?php 
    if($mensaje) {
        echo '<p class="alerta exito">' . $mensaje . '</p>';
    }
    ?>
    <picture>
        <source srcset="build/img/destacada3.webp" type="image/webp">
        <source srcset="build/img/destacada3.jpg" type="image/jpeg">
        <img loading="lazy" src="build/img/destacada3.jpg" alt="destacada3">
    </picture>

    <h2>Llene el formulario de contacto</h2>

    <form class="formulario" action="/contacto" method="POST">
        <fieldset>
            <legend>Información personal</legend>
            <label for="nombre">Nombre:</label>
            <input type="text" name="contacto[nombre]" id="nombre" placeholder="Nombre" required>

            <label for="mensaje">Mensaje:</label>
            <textarea name="contacto[mensaje]" id="mensaje" required></textarea>
        </fieldset>

        <fieldset>
            <legend>Información sobre la propiedad</legend>

            <label for="opciones">Vende o Compra:</label>
            <select name="contacto[tipo]" id="options" required>
                <option value="" disabled selected>--Selecione--</option>
                <option value="Compra">Compra</option>
                <option value="Vende">Vende</option>
            </select>

            <label for="presupuesto">Precio o Presupuesto:</label>
            <input type="number" name="contacto[presupuesto]" id="presupuesto" placeholder="Precio o Presupuesto" required>
        </fieldset>

        <fieldset>
            <legend>Contacto</legend>
            <p>Como desea ser contactado?</p>
            <div class="forma-contacto">
                <label for="contactar-telefono">Teléfono</label>
                <input name="contacto[contacto]" type="radio" value="telefono" id="contactar-telefono" required>

                <label for="contactar-email">Mail</label>
                <input name="contacto[contacto]" type="radio" value="email" id="contactar-email" required>
            </div>

            <div id="contacto"></div>

        </fieldset>

        <input type="submit" id="send" value="Enviar" class="boton-verde">
    </form>

</main>