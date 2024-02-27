
<fieldset>
    <legend>Informacion General</legend>
    <!-- titulo -->
    <label for="titulo">Titulo</label>
    <input type="text" id="titulo" name="propiedad[titulo]" placeholder="Titulo propiedad" value="<?php echo s($propiedad->getTitulo()) ?>">

    <!-- precio -->
    <label for="precio">Precio</label>
    <input type="number" id="precio" name="propiedad[precio]" placeholder="Precio $222.22" value="<?php echo s($propiedad->getPrecio()) ?>">

    <!-- imagen -->
    <label for="imagen">Imagen</label>
    <input type="file" id="imagen" accept="image/jpeg, image/png" name="propiedad[imagen]">
    <?php if($propiedad->getImagen()): ?>
        <img style="width: 20rem;" src="../../imagenes/<?php echo s($propiedad->getImagen()) ?>" alt="img">
    <?php endif ?>


    <!-- descripcion -->
    <label for="descripcion">Descripcion</label>
    <textarea id="descripcion" name="propiedad[descripcion]"><?php echo s($propiedad->getDescripcion()) ?></textarea>
</fieldset>

<fieldset>
    <legend>Informacion de la propiedad</legend>

    <!-- habitaciones -->
    <label for="habitaciones">Habitacion</label>
    <input type="number" id="habitaciones" name="propiedad[habitaciones]" min="1" placeholder="Ej: 2"
        value="<?php echo s($propiedad->getHabitaciones()) ?>">

    <!-- banos -->
    <label for="wc">Baños</label>
    <input type="number" id="wc" name="propiedad[wc]" min="1" placeholder="Ej: 2" value="<?php echo s($propiedad->getWc()) ?>">

    <!-- estacionamiento -->
    <label for="estacionamiento">Estacionamiento</label>
    <input type="number" id="estacionamiento" name="propiedad[estacionamiento]" min="1" placeholder="Ej: 2"
        value="<?php echo s($propiedad->getEstacionamiento()) ?>">
</fieldset>
<fieldset>
    <legend>Vendedor</legend>

    <!-- vendedor -->
    <select name="propiedad[vendedores_id]">
        <option value=""> -- seleccione -- </option>
        <?php foreach ($vendedores as $vendedor): ?>
            <option <?php echo $vendedor->getId() == $propiedad->getVendedores_id() ? 'selected' : ''; ?> value="<?php echo s($vendedor->getId()) ?>">
                <?php echo $vendedor->getNombre() . " " . $vendedor->getApellido() ?>
            </option>
        <?php endforeach ?>

    </select>
</fieldset>