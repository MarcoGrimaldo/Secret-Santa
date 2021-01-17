<?php
    $id_intercambio = $_GET['id_in'];
    $name_inter = "";
    $fecha_inter = "";
    $mon_max = 0;
    $tema_inter = "";
    $coments = "";
    $id_creador = 0;
    $nombre_creador = "";

    try{
        $conexion = new PDO('mysql:host=localhost;dbname=SecretSanta','root','');
    }catch(PDOException $e)
    {
        echo "Error: " , $e->getMessage();
    }

    $statement2 = $conexion->prepare('SELECT * FROM Intercambio WHERE Clave_intercambio = :id_i');

    $statement2->execute(array(
        ':id_i' => $id_intercambio
    ));

    $resultado = $statement2->fetch();

    if($resultado)
    {
        $name_inter = $resultado['Nombre_intercambio'];
        $fecha_inter = $resultado['Fecha_limite'];
        $mon_max = $resultado['Monto_maximo'];
        $tema_inter = $resultado['Tema_intercambio'];
        $coments = $resultado['Comentarios'];
        $id_creador = $resultado['Id_usuario'];


        $statement5 = $conexion->prepare('SELECT Nombre FROM Usuario WHERE Id_usuario = :id');
        $resa = $statement5->execute(array(
            ':id' => $id_creador
        ));

        $nom_creador = $statement5->fetch();
        $nombre_creador = $nom_creador['Nombre'];

    }

    if(isset($_POST['acp_btn']))
    {
        header('Location: inicio.php');
    }

    if(isset($_POST['brr_btn']))
    {
        if($id_creador == $_SESSION['id'])
        {
            //drop intercambio
        }
        else
        {
            $statement6 = $conexion->prepare('DELETE FROM Invitacion WHERE Id_usuario = :id_u AND Clave_intercambio = :cl_in');
            $resa = $statement6->execute(array(
                ':id_u' => $_SESSION['id'],
                ':cl_in' => $id_intercambio
            ));

            if($resa)
            {
                echo "<script>alert('Borrado de Invitacion');</script>";
            }

            $statement7 = $conexion->prepare('DELETE FROM Participantes_intercambio WHERE Clave_intercambio = :cl_in AND Nombre = :nom');
            $resa0 = $statement7->execute(array(
                ':cl_in' => $id_intercambio,
                ':nom' => $_SESSION['usuario']
            ));

            if($resa0)
            {
                echo "<script>alert('Borrado de Participantes');</script>";
                header('Location: inicio.php');
            }

        }
    }
?>