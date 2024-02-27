<?php
if (!isset($_SESSION)) {
  session_start();
}

$auth = $_SESSION['login'] ?? null;
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Bienes raices</title>
  <link rel="stylesheet" href="../../../bienesraices_inicio/build/css/app.css" />
</head>

<body>

  <header class="header <?php echo $inicio ? 'inicio' : '' ?> ">
    <div class="contenedor contenido-header">

      <div class="barra">
        <a href="/../bienesraices_inicio/Index.php">
          <img src="/bienesraices_inicio/build/img/logo.svg" alt="Logo" />
        </a>

        <div class="mobile-menu">
          <img src="/bienesraices_inicio/build/img/barras.svg" alt="ico" />
        </div>

        <div class="derecha">
          <img src="/bienesraices_inicio/build/img/dark-mode.svg" alt="darkmode" class="darkmode" />
          <nav class="navegacion">
            <a href="/bienesraices_inicio/nosotros.php">Nosotros</a>
            <a href="/bienesraices_inicio/anuncio.php">Anuncios</a>
            <a href="/bienesraices_inicio/blog.php">Blog</a>
            <a href="/bienesraices_inicio/contacto.php">Contacto</a>
            <?php if($auth):?>
            <a href="/bienesraices_inicio/cerrar-sesion.php">Cerrar Sesion</a>
            <?php else:?>
              <a href="/bienesraices_inicio/login.php">Iniciar sesion</a>
            <?php endif?>
          </nav>
        </div>
      </div>
      <!-- barra -->

      <?php if ($inicio) { ?>
        <h1>Venta de casas y departamentos exclusivos de lujo</h1>
      <?php } ?>

    </div>
  </header>