<main class="contenedor seccion">
    <a href="/admin" class="boton boton-verde-blog">Volver</a>
    <h1>Agregar vendedor</h1>
    <?php foreach ($errores as $error): ?>
    <div class="alerta error">
      <?php echo $error; ?>
    </div>
  <?php endforeach; ?>
    <form class="formulario" method="POST">
        <?php
        include __DIR__ . '/formulario.php';
        ?>
        <input type="submit" value="Registrar" class="boton boton-verde-blog">
    </form>

</main>