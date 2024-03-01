
<div class="contenedor-anuncio">
    <?php foreach ($propiedad as $anuncio) : ?>
        <div class="anuncio">
            <img src='imagenes/<?php echo $anuncio->getImagen() ?>' alt="img" loading="lazy" />
            <div class="contenido-anuncio">
                <h3><?php echo $anuncio->getTitulo()?></h3>
                <p><?php echo $anuncio->getDescripcion()?></p>
                <p class="precio"><?php echo $anuncio->getPrecio()?></p>

                <ul class="iconos-caracteristicas">
                    <li>
                        <img src="build/img/icono_wc.svg" alt="ico" loading="lazy" />
                        <p><?php echo $anuncio->getWc()?></p>
                    </li>

                    <li>
                        <img src="build/img/icono_estacionamiento.svg" alt="ico" loading="lazy" />
                        <p><?php echo $anuncio->getEstacionamiento()?></p>
                    </li>
                    <li>
                        <img src="build/img/icono_dormitorio.svg" alt="ico" loading="lazy" />
                        <p><?php echo $anuncio->getHabitaciones()?></p>
                    </li>
                </ul>

                <a href="propiedad_ind?id=<?php echo $anuncio->getId()?>" class="boton boton-amarillo">Ver propiedad</a>
            </div>
        </div>
    <?php endforeach ?>
</div>