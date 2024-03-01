<main class="contenedor">
  <?php if($mensaje): ?>
    <p class="alerta exito"><?php echo $mensaje ?></p>
  <?php endif ?>
  ?>
    <h1>Contactanos</h1>
    <picture>
      <source src="build/img/destacada3.webp" type="image/webp" />
      <source src="build/img/destacada3.jpg" type="image/jpg" />
      <img loading="lazy" src="build/img/destacada3.jpg" alt="img-contacto" />
    </picture>

    <h2>Llene el formulario de contacto</h2>
    <form class="formulario" action="/contacto" method="POST">

      <fieldset>
        <legend>Informacion personal</legend>

        <label for="nombre">Nombre: </label>
        <input id="nombre" name="contacto[nombre]" type="text" placeholder="Tu nombre" required/>


        <label for="mensaje">Mensaje: </label>
        <textarea id="mensaje" name="contacto[mensaje]" required></textarea>
      </fieldset>

      <fieldset>
        <legend>Informacion sobre la propiedad</legend>

        <label for="opciones">Vende o compra: </label>
        <select id="opciones" name="contacto[tipo]" required>
          <option value="" disabled selected>--seleccione--</option>
          <option value="Compra">Compra</option>
          <option value="Vende">Vende</option>
        </select>

        <label for="presupuesto">Precio o presupuesto</label>
        <input type="number" name="contacto[presupuesto]" required/>
      </fieldset>

      <fieldset>
        <legend>Contacto</legend>

        <p>Como desea ser contactado</p>
        <div class="forma-contacto">
          <label for="contactar-telefono">Telefono</label>
          <input type="radio" value="telefono" id="contactar-telefono" name="contacto[contacto]" required/>
          <label for="contactar-email">Email</label>
          <input type="radio" value="email" id="contactar-email" name="contacto[contacto]" required/>
        </div>
        <div id="contacto"></div>

      </fieldset>

      <input type="submit" value="enviar" class="boton-verde no-border" />
    </form>
  </main>
