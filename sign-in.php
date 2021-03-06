<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.79.0">
    <title>Iniciar</title>

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
    <link href="styles/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
    
<main class="form-signin">
  <form method="POST">
    <img class="mb-4" src="images/icon.png" alt="" width="72" height="72">
    <h1 class="h3 mb-3 fw-normal">Iniciar sesión</h1>
    <label for="inputEmail" class="visually-hidden" >Email address</label>
    <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Correo electronico" required autofocus>
    <label for="inputPassword" class="visually-hidden">Password</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" name="password"required>
    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Recordarme
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Iniciar</button>
    <br>
    <br>
  </form>
  <?php
      if(isset($_POST['submit']))
      {
          require("signin.php");
      }
  ?>
  <p class="mt-5 mb-3 text-muted">¿No tienes una cuenta?</p>
  <a href="registro.php" class="w-100 btn btn-lg btn btn-light">Registrate</a>
<p class="mt-5 mb-3 text-muted">&copy; 2020-2021</p>
</main>
    
  </body>
</html>
