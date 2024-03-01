<?php
?>
<main class="contenedor">
  <h1>Mas sobre nosotros</h1>
  <div class="iconos-nosotros">
    <div class="icono">
      <img src="/build/img/icono1.svg" alt="icono" loading="lazy" />
      <h3>Seguridad</h3>
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis
        nostrum perspiciatis mollitia temporibus porro eligendi, rerum quam
        voluptate laborum. Quam incidunt voluptatum, quidem a modi ipsum
        minima explicabo nobis rem.
      </p>
    </div>
    <div class="icono">
      <img src="/build/img/icono2.svg" alt="icono" loading="lazy" />
      <h3>Precio</h3>
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis
        nostrum perspiciatis mollitia temporibus porro eligendi, rerum quam
        voluptate laborum. Quam incidunt voluptatum, quidem a modi ipsum
        minima explicabo nobis rem.
      </p>
    </div>
    <div class="icono">
      <img src="/build/img/icono3.svg" alt="icono" loading="lazy" />
      <h3>A tiempo</h3>
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis
        nostrum perspiciatis mollitia temporibus porro eligendi, rerum quam
        voluptate laborum. Quam incidunt voluptatum, quidem a modi ipsum
        minima explicabo nobis rem.
      </p>
    </div>
  </div>
</main>

<section class="seccion contenedor">
  <h2>Casas y depas en venta</h2>
  <?php
  include 'listado.php';
  ?>
  
  <div class="ver-todas alinear-derecha">
    <a href="anuncio" class="boton-verde-blog">Ver todas</a>
  </div>
</section>

<section class="imagen-contacto">
  <h2>Encuentra la casa de tus sue;os</h2>
  <p>
    Llena el formulario de contacto y un asesor se pondra en contaacto
    contigo a la brevedad
  </p>
  <a href="contacto" class="boton-amarillo-blog">Contactanos</a>
</section>

<div class="contenedor seccion seccion-inferior">
  <section class="blog">
    <h2>Nuestro Blog</h2>

    <article class="entrada-blog">
      <div class="imagen">
        <picture>
          <source src="build/img/blog1.webp" type="image/webp" />
          <source src="build/img/blog1.jpg" type="image/jpg" />
          <img loading="lazy" src="/build/img/blog1.jpg" alt="" />
        </picture>
      </div>
      <div class="texto-entrada">
        <a href="entrada">
          <h4>Terraza en el techo de tu casa</h4>
          <p class="informacion-meta">
            Escrito el: <span>08/02/2024</span>por: <span>Admin</span>
          </p>
          <p>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nemo,
            dolore rem maxime incidunt iusto aperiam, modi quae ut ullam
          </p>
        </a>
      </div>
    </article>
    <article class="entrada-blog">
      <div class="imagen">
        <picture>
          <source src="build/img/blog2.webp" type="image/webp" />
          <source src="build/img/blog2.jpg" type="image/jpg" />
          <img loading="lazy" src="build/img/blog2.jpg" alt="" />
        </picture>
      </div>
      <div class="texto-entrada">
        <a href="entrada">
          <h4>Guia para la decoracion</h4>
          <p class="informacion-meta">
            Escrito el: <span>12/07/2024</span>por: <span>Admin</span>
          </p>
          <p>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nemo,
            dolore rem maxime incidunt iusto aperiam, modi quae ut ullam
          </p>
        </a>
      </div>
    </article>
  </section>

  <section class="testimoniales">
    <h1>testimoniales</h1>
    <div class="testimonial">
      <blockquote>
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quos quod
        dolores temporibus assumenda quibusdam expedita, animi
      </blockquote>
      <p>Jose Ayala</p>
    </div>
  </section>
</div>
