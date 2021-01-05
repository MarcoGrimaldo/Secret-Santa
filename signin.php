 <?php

    session_start();

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $usuario = $_POST['email'];
        $password = $_POST['password'];

        try{
            $conexion = new PDO('mysql:host=localhost;dbname=SecretSanta','root','');
        }catch(PDOException $e)
        {
            echo "Error: " , $e->getMessage();
        }

        $statement = $conexion->prepare('SELECT * FROM Usuario WHERE Correo = :usuario AND Password = :password');

        $statement->execute(array(
            ':usuario' => $usuario,
            ':password' => $password
        ));

        $resultado = $statement->fetch();
        
        //echo $resultado;

        if($resultado !== false)
        {
            $_SESSION['usuario'] = $resultado['Nombre'];
            $_SESSION['id'] = $resultado['Id_usuario'];
            //echo $_SESSION['usuario'];
            //echo $_SESSION['id'];
            header('Location: inicio.php');
        }
    }



 ?>