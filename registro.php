<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/registro.css">
</head>
<body>
    <div class="registration-form">
        <form method="POST" action="">
            <div class="form-icon">
                <span><i class="icon icon-user"></i></span>
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" name="realname" placeholder="Nombre">
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" name="username" placeholder="Username">
            </div>
            <div class="form-group">
                <input type="password" class="form-control item" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <button type="submit" name="submit" value="Registrarme"class="btn btn-block create-account">Crear cuenta</button>
            </div>
        </form>
        <?php
            if(isset($_POST['submit']))
            {
                require("registrar.php");
            }
        ?>

    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="scripts/registro.js"></script>
</body>
</html>
