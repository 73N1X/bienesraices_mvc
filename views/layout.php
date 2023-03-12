<?php 
if(!isset($_SESSION)) {
  session_start();
}

$auth = $_SESSION['login'] ?? false;

if(!isset($inicio)) {
    $inicio = false;
}
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bienes Raices</title>
    <link rel="icon" type="image/x-icon" href="/build/img/favicon.ico">
    <link rel="stylesheet" href="../build/css/app.css" />
  </head>
  <body>
    <header class="header <?php echo $inicio ? 'init' : ''; ?>">
      <div class="container header-content">
        <div class="bar">
          <a href="/" title="homepage">
            <img src="/build/img/logo.svg" alt="Logotipo de Bienes Raices" />
          </a>

          <div class="mobile-menu">
            <img src="/build/img/barras.svg" alt="iconomenu" />
          </div>
          <div class="derecha">
            <img
              src="/build/img/dark-mode.svg"
              alt="darkmode"
              class="darkmode"
            />
            <nav class="navigation">
              <a href="/nosotros">Nosotros</a>
              <a href="/propiedades">Anuncios</a>
              <a href="/blogs">Blog</a>
              <a href="/contacto">Contacto</a>
              <?php if($auth): ?>
                <a href="/logout">Cerrar Sesión</a>
                <a href="/admin">Admin</a>
              <?php endif; ?>
              <?php if(!$auth): ?>
                <a href="/login">Login</a>
              <?php endif; ?>
            </nav>
          </div>
        </div>
        <div>
            <?php if ($inicio) { ?>
          <h1>Venta de Casas y Departamentos Exculivos de Lujo</h1>
          <?php } ?>
        </div>
      </div>
    </header>

    <?php echo $contenido; ?>

    <footer class="footer section">
      <div class="container footer-container">
        <nav class="navigation">
          <a href="/nosotros">Nosotros</a>
          <a href="/propiedades">Anuncios</a>
          <a href="/blogs">Blog</a>
          <a href="/contacto">Contacto</a>
        </nav>
      </div>
      <p class="copyright">Todos los derechos Reservados <?php echo date('Y'); ?> &copy;</p>
    </footer>

    <script src="../build/js/bundle.min.js"></script>
  </body>
</html>