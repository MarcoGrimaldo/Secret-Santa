 <?php

    $email_friend = $_POST['email_amigo'];
    $id_user = $_SESSION['id'];

    try{
        $conexion = new PDO('mysql:host=localhost;dbname=SecretSanta','root','');
    }catch(PDOException $e)
    {
        echo "Error: " , $e->getMessage();
    }

    $statement2 = $conexion->prepare('SELECT * FROM Usuario WHERE Correo = :correo_a');

    $statement2->execute(array(
        ':correo_a' => $email_friend
    ));

    $resultado = $statement2->fetch();

    //$id_amigo = $resultado['Id_usuario'];
    $nombre_amigo = $resultado['Nombre'];

    //echo $id_amigo . $nombre_amigo;

    if($resultado !== false)
    {
        $statement3 = $conexion->prepare("INSERT INTO Amigos VALUES(:id_usu, NULL, :nom_amigo, :correo_amix)");
        $verif = $statement3->execute(array(
            ':id_usu' => intval($id_user),
            ':nom_amigo' => $nombre_amigo,
            ':correo_amix' => $email_friend
        ));

        //print_r($statement3->errorInfo());

        //$resultado = $statement3->fetch();

        if($verif){
            echo "<script>alert('Amigo agregado!');</script>";
        }

        
    }


 ?>