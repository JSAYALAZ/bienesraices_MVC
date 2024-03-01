<main class="contenedor seccion contenido-centrado">
  <h1><?php echo $anuncio->getTitulo()?></h1>
  <div class="resumen-propiedad">
  <img loading="lazy" src="imagenes/<?php echo $anuncio->getImagen()?>" alt="img" />
    <p class="precio">$ <?php echo $anuncio->getPrecio()?></p>
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

    <h3><?php echo $anuncio->getDescripcion()?></h3>
  </div>
</main>