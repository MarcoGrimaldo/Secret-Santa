<?php
  session_start();

?>


<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.79.0">
    <title>Intercambios</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap-5.0.0/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="styles/sticky-footer-navbar.css" rel="stylesheet">
  </head>
  <body class="d-flex flex-column h-100">
    
<header>
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="images/icon.png" alt="" width="30" height="30">
      </a>
      <a class="navbar-brand" href="#">Secret Santa</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="inicio.php">Inicio</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="#">Intercambios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="amigos.php">Amigos</a>
          </li>
        </ul>
        <form method="POST" class="d-flex">
          <button href="index.html" class="btn btn btn-danger" type="submit" name="cerrar">Cerrar Sesión</button>
        </form>
        <?php 
          if(isset($_POST['cerrar']))
          {
            session_destroy();
            header('Location: index.html');
          }
        ?>
      </div>
    </div>
  </nav>
</header>

<!-- Begin page content -->
<main class="flex-shrink-0">
  <div class="container text-center">
    <h1 class="mt-5">Intercambios</h1>
    <br>
    <ul class="list-group">
      <?php require("mostrar_intercambios.php");?>
    </ul>
    <br>
    <a href="crear_intercambio.php" class="w-100 btn btn-lg btn btn-dark">Crear un intercambio</a>
  </div>
</main>

<footer class="mt-auto text-white-50">
  <p>Secret Santa. Proyecto para Software Engineering for Movile Devices - ESCOM. Todos los derechos reservados. </p>
</footer>


    <script src="bootstrap-5.0.0/js/bootstrap.min.js"></script>

      
  </body>
</html>
