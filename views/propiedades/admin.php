<?php
$carpetaImagenes = '../imagenes/';
?>
<main class="contenedor seccion">
    <h1>Administrador de bienes raices</h1>

    <?php
    if ($resultado) {
        $mensaje = muestraMensaje(intval($resultado));
        if ($mensaje) { ?>
            <p class="alerta exito">
                <?php echo s($mensaje) ?>
            </p>
        <?php } ?>
    <?php } ?>

    <a href="./propiedades/crear" class="boton boton-verde-blog">Nueva Propiedad</a>
    <a href="./vendedores/crear" class="boton boton-amarillo-blog">Nuevo Vendedor</a>

    <h2>Propiedad</h2>
    <table class="propiedades">
        <thead>
            <tr>
                <th>Id</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($propiedades as $propiedad): ?>
                <tr>
                    <td>
                        <p>
                            <?php echo $propiedad->getId() ?>
                        </p>
                    </td>
                    <td>
                        <p>
                            <?php echo $propiedad->getTitulo() ?>
                        </p>
                    </td>
                    <td>
                        <img src=<?php echo $carpetaImagenes . $propiedad->getImagen() ?> class="imagen-tabla">
                    </td>
                    <td>
                        <p>
                            <?php echo $propiedad->getPrecio() ?>
                        </p>
                    </td>
                    <td>
                        <form method="POST" class="w-100" action="./propiedades/eliminar">
                            <input type="hidden" name="id" value="<?php echo $propiedad->getId() ?>">
                            <input type="hidden" name="tipo" value="propiedad">
                            <input type="submit" value="Eliminar" class="boton-rojo-blog">
                        </form>
                        <a href="./propiedades/actualizar?id=<?php echo $propiedad->getId() ?>"
                            class="boton-amarillo">Actualizar</a>
                    </td>
                </tr>
            <?php endforeach ?>

        </tbody>
    </table>
    <h2>Verdedores</h2>
    <table class="propiedades">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Celular</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vendedores as $vendedor): ?>
                <tr>
                    <td>
                        <p>
                            <?php echo $vendedor->getId() ?>
                        </p>
                    </td>
                    <td>
                        <p>
                            <?php echo $vendedor->getNombre().' '.$vendedor->getApellido()  ?>
                        </p>
                    </td>
                    <td>
                        <p>
                            <?php echo $vendedor->getPhone() ?>
                        </p>
                    </td>
                    <td>
                        <form method="POST" class="w-100" action="../vendedores/eliminar">
                            <input type="hidden" name="id" value="<?php echo $vendedor->getId() ?>">
                            <input type="hidden" name="tipo" value="vendedor">
                            <input type="submit" value="Eliminar" class="boton-rojo-blog">
                        </form>
                        <a href="../vendedores/actualizar?id=<?php echo $vendedor->getId() ?>"
                            class="boton-amarillo">Actualizar</a>
                    </td>
                </tr>
            <?php endforeach ?>

        </tbody>
    </table>
</main>