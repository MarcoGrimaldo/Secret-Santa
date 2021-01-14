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
?>