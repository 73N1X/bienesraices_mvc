<fieldset>
    <legend></legend>

    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="vendedor[nombre]" placeholder="Nombre Vendedor(a)" value="<?php echo sz($vendedor->nombre); ?>">

    <label for="apellido">Apellido:</label>
    <input type="text" id="apellido" name="vendedor[apellido]" placeholder="Apellido Vendedor(a)" value="<?php echo sz($vendedor->apellido); ?>">
</fieldset>

<fieldset>
    <legend>Información Extra</legend>

    <label for="telefono">Teléfono:</label>
    <input type="tel" id="telefono" name="vendedor[telefono]" placeholder="Número de Teléfono" value="<?php echo sz($vendedor->telefono); ?>">

    <label for="email">E-Mail:</label>
    <input type="email" id="email" name="vendedor[email]" placeholder="E-Mail" value="<?php echo sz($vendedor->email); ?>">
</fieldset>