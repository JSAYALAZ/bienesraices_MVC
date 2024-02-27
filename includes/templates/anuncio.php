<?php
use App\Propiedad;
$propiedad = Propiedad::all($limite);
$carpetaImagenes = '../../../bienesraices_inicio/imagenes/';
?>
<div class="contenedor-anuncio">
    <?php foreach ($propiedad as $anuncio) : ?>
        <div class="anuncio">
            <img src=<?php echo $carpetaImagenes. $anuncio->getAll('imagen') ?> alt="img" loading="lazy" />
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

                <a href="../../../bienesraices_inicio/anuncio_individual.php?id=<?php echo $anuncio->getId()?>" class="boton boton-amarillo">Ver propiedad</a>
            </div>
        </div>
    <?php endforeach ?>
</div>