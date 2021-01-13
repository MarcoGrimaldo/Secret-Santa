<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.79.0">
    <title>Intercambio</title>

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
          <li class="nav-item active">
            <a class="nav-link" aria-current="page" href="inicio.php">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="intercambios.php">Intercambios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="amigos.php">Amigos</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>

<!-- Begin page content -->
<main class="flex-shrink-0">
  <?php require("con_intercambios.php"); ?>
  <div class="container text-center">
    <h1 class="mt-5"><?php echo $name_inter; ?></h1>
  </div>
  <div class="container">
    <div class="input-group mb-3">
      <span class="input-group-text" id="inputGroup-sizing-default">Clave</span>
      <input type="text" class="form-control" value=" <?php echo $id_intercambio; ?> " disabled>
    </div>
    <div class="input-group mb-3">
      <span class="input-group-text" id="inputGroup-sizing-default">Fecha</span>
      <input type="text" class="form-control" value=" <?php echo $fecha_inter; ?> " disabled>
    </div>
  </div>
  <div class="container">
    <p class="lead">Tema de los regalos</p>
    <ul class="list-group">
      <li class="list-group-item"><?php echo $tema_inter; ?></li>
    </ul>
  </div>
  <div class="container">
    <p class="lead">Comentarios</p>
    <p> <?php echo $coments; ?> </p>
  </div>
  <div class="container">
    <p class="lead">Participantes</p>
    <ul class="list-group">
    <?php

        $statement0 = $conexion->prepare('SELECT * FROM Participantes_intercambio WHERE Clave_intercambio = :id_u');

        $statement0->execute(array(
            ':id_u' => $id_intercambio
        ));

        $resultado0 = $statement0->fetchAll();

        if($resultado0)
        {
            foreach($resultado0 as $fila)
            {
              echo '<li class="list-group-item d-flex justify-content-between align-items-center">'.
                    $fila['Nombre'] . '</li>';
            }
        }
        else
        {
          echo '<li class="list-group-item d-flex justify-content-between align-items-center">
          No hay invitados :(</li>';
        }
      ?>
    </ul>
  </div>
  <div class="container">
    <div class="d-grid gap-2">
      <button class="btn btn-success" type="button">Aceptar</button>
      <button class="btn btn-danger" type="button">Borrar</button>
    </div>
  </div>
</main>

<footer class="mt-auto text-white-50">
  <p>Secret Santa. Proyecto para Software Engineering for Movile Devices - ESCOM. Todos los derechos reservados. </p>
</footer>


    <script src="bootstrap-5.0.0/js/bootstrap.min.js"></script>

      
  </body>
</html>
