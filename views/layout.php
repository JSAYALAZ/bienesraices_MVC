<?php
if (!isset($_SESSION)) {
  session_start();
}

$auth = $_SESSION['login'] ?? null;

if (!isset($inicio)) {
  $inicio = false;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Bienes raices</title>
  <link rel="stylesheet" href="../build/css/app.css" />
</head>

<body>

  <header class="header <?php echo $inicio ? 'inicio' : '' ?> ">
    <div class="contenedor contenido-header">

      <div class="barra">
        <a href="../../layout.php">
          <img src="../build/img/logo.svg" alt="Logo" />
        </a>

        <div class="mobile-menu">
          <img src="../build/img/barras.svg" alt="ico" />
        </div>

        <div class="derecha">
          <img src="../build/img/dark-mode.svg" alt="darkmode" class="darkmode" />
          <nav class="navegacion">
            <a href="../nosotros.php">Nosotros</a>
            <a href="../anuncio.php">Anuncios</a>
            <a href="../blog.php">Blog</a>
            <a href="../contacto.php">Contacto</a>
            <?php if ($auth): ?>
              <a href="../cerrar-sesion.php">Cerrar Sesion</a>
            <?php else: ?>
              <a href="../login.php">Iniciar sesion</a>
            <?php endif ?>
          </nav>
        </div>
      </div>
      <!-- barra -->

      <?php if ($inicio) { ?>
        <h1>Venta de casas y departamentos exclusivos de lujo</h1>
      <?php } ?>

    </div>
  </header>

  <?php
  echo $contenido;
  ?>

  <footer class="footer seccion">
    <div class="contenedor-footer">
      <nav class="navegacion">
        <a href="nosotros.html">Nosotros</a>
        <a href="anuncio.html">Anuncios</a>
        <a href="blog.html">Blog</a>
        <a href="contacto.html">Contacto</a>
      </nav>
    </div>

    <p class="copyright">Todos los derechos Reservador 2024 &copy;</p>
  </footer>

  <script src="../build/js/bundle.min.js"></script>
</body>

</html>